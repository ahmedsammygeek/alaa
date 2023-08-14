<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Category;
use App\Models\Governorate;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\City;
use App\Models\Complain;
use Auth;
use Str;
use Storage;
use Hash;
use Zip;
use App\Http\Requests\Site\RegisterRequest;
use App\Http\Requests\Site\SoreOrderRequest;
use App\Http\Requests\Site\LoginRequest;
use App\Http\Requests\Site\StoreComplainRequest;
use App\Jobs\SendVerificationCodeToViaPhoneNumberJob;
use App\Jobs\IncreasProductSalesCountJob;
use App\Jobs\IncreasProductViewsCountJob;
class SiteController extends Controller
{


    public function index() {
        $slides = Slide::where('active' , 1)->latest()->get();
        $latest_products = Product::with(['category' , 'images'])->latest()->take(12)->get();
        $best_selling_products = Product::orderBy('sales_count' , 'DESC' )->take(6)->get();
        $categories = Category::where('show_after_slider' , 1 )->latest()->get();
        $home_categories = Category::where('show_in_home_page' , 1 )->latest()->get();
        $slider_categories = Category::where('show_after_slider' , 1 )->latest()->get();
        return view('site.index' , compact('slides' , 'slider_categories' , 'home_categories' , 'categories' , 'latest_products' , 'best_selling_products'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function page(Page $page)
    {
        return view('site.page' , compact('page') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product(Product $product)
    {
        dispatch(new IncreasProductViewsCountJob($product));
        $similar_products = Product::where('category_id' , $product->category_id )->inRandomOrder()->take(3)->get();
        $best_selling_products = Product::orderBy('sales_count' , 'DESC' )->take(6)->get();
        return view('site.product' , compact('product' , 'similar_products' , 'best_selling_products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        return view('site.products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('site.login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('site.register');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        return view('site.account');
    }


    public function login_system(LoginRequest $request)
    {

        if (Auth::attempt(['password' => $request->password ,'phone' => $request->mobile], true)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->with('error' ,  'بيانات الدخول غير صحيحه' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category_products(Category $category)
    {
        $products = Product::where('active' , 1)->where('category_id' , $category->id )->latest()->paginate(20);
        return view('site.category_products' , compact('category' , 'products') );
    }

    public function search(Request $request)
    {
        $products = Product::where(function($query) use($request) {
            $query->where('name->en' , 'LIKE' , '%'.$request->search.'%' )->orWhere('name->ar' , 'LIKE' , '%'.$request->search.'%' );
        });
        if ($request->category_name != 'all' ) {
            $products->where('category_id' , $request->category_name );
        }
        $products = $products->latest()->get();
        return view('site.search' , compact('products'));
    }

    public function store_register(RegisterRequest $request)
    {
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->type = 3;
        $user->save();
        Auth::login($user);
        dispatch(new SendVerificationCodeToViaPhoneNumberJob($request->phone));
        return redirect(route('site.verify_phone'));
    }

    public function cart()
    {
        return view('site.cart');
    }

    public function checkout()
    {
        return view('site.checkout');
    }


    public function save_order(SoreOrderRequest $request)
    {
        $sub_total = 0;
        $total = 0;
        $items = Cart::where('user_id' , Auth::id() )->get();
        foreach ($items as $item) {
            $sub_total += ($item->quantity * $item->price );
        }
        // calculate the shipping cost
        $city = City::find($request->city);
        $governorate = Governorate::find($request->governorate_id);
        $shipping_cost = $city->shipping_cost ? $city->shipping_cost : $governorate->shipping_cost;

        $order = new Order;
        $order->number = time().mt_rand(1 , 1000).Auth::id();
        $order->total = $total;
        $order->user_id = Auth::id();
        $order->subtotal = $sub_total;
        $order->shipping_cost = $shipping_cost;
        $order->total = $shipping_cost + $sub_total ;
        $order->discount = 0;
        $order->governorate_id = $request->governorate_id;
        $order->city_id = $request->city;
        $order->address = $request->address;
        $order->shipping_statues_id = 1;
        $order->order_phone = $request->phone;
        $order->client_name = $request->client_name;
        $order->save();

        foreach ($items as $item) {
            $order_item = new OrderItem;
            $order_item->order_id = $order->id;
            $order_item->variation_id = $item->variation_id;
            $order_item->price = $item->price;
            $order_item->quantity = $item->quantity;
            $order_item->save();
            dispatch(new IncreasProductSalesCountJob($item->variation_id));
        }
        Cart::where('user_id' , Auth::id() )->delete();
        return view('site.success')->with('success' , 'تم انشاء الطلب بنجاح' );
    }

    public function complains()
    {
        return view('site.complains');
    }

    public function store_complains(StoreComplainRequest $request)
    {
        $complain = new Complain;
        $complain->user_id = Auth::id();
        $complain->content = $request->content;
        $complain->phone = $request->phone;
        $complain->email = $request->email;
        $complain->category = $request->category;
        $complain->type = $request->type;
        $complain->save();
        toastr()->success('تم الارسال بنجاح');
        return redirect()->back();
    }

    public function downloadProductImages(Product $product)
    {
        $zip_file =  Zip::create( $product->name.'-images.zip');
        $zip_file->add("s3://alaa-eldeen-s3-bucket/products/".$product->image, $product->image );
        foreach ($product->images as $product_image) {
           $zip_file->add("s3://alaa-eldeen-s3-bucket/products/".$product_image->image, $product_image->image );
        }
        return $zip_file;
    }

    public function phone()
    {
        return view('site.phone');
    }

    public function update_phone(Request $request)
    {

        $user = Auth::user();
        $user->phone = $request->phone;
        $user->save();
        dispatch(new SendVerificationCodeToViaPhoneNumberJob($request->phone));
        return redirect(route('site.verify_phone'));
    }

}

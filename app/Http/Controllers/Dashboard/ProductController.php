<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\ProductImage;
use App\Models\WarehouseProduct;
use App\Models\Country;
use App\Models\Variation;
use App\Models\ProductShipping;
use App\Models\OrderItem;
use Auth;
use App\Http\Requests\Dashboard\Products\StoreProductRequest;
use App\Http\Requests\Dashboard\Products\UpdateProductRequest;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $countries = Country::all();
        return view('dashboard.products.create' , compact('brands' , 'countries' ,'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {


        $product = new Product;
        if(!$product->add($request->all()))
            return redirect()->back()->with('error' , trans('products.adding_error'));
        if($request->hasFile('image')) {
            $product->image = basename($request->file('image')->store('products'));
            $product->save();
        }

        if($request->hasFile('images')) {
            $images = [];
            for ($i = 0; $i <count($request->images) ; $i++) {
                $images[] = new ProductImage([
                    'product_id' => $product->id ,
                    'image' => basename($request->file('images.'.$i)->store('products')) ,  
                ]);
            }
            $product->images()->saveMany($images);
        }

        if ($request->has('add')) {
            $variation = new Variation;
            $variation->product_id = $product->id;
            $variation->user_id = Auth::id();
            $variation->price = $product->price;
            $variation->type = 'one_size';
            $variation->barcode = $product->barcode;
            $variation->save();
        }

        if ($request->has('add')) {
           return redirect(route('dashboard.products.index'))->with('success' , trans('products.adding_success'));
        } else {
            return redirect(route('dashboard.products.variations.create' , $product ))->with('success' , trans('products.adding_success'));
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load(['images' , 'country' , 'warehouses' , 'warehouses.warehouse' , 'brand' , 'category'  , 'user']);
        return view('dashboard.products.show' , compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $countries = Country::all();
        return view('dashboard.products.edit' , compact('brands' , 'countries' ,'categories' , 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request,Product $product)
    {
        if(!$product->edit($request->all()))
            return redirect()->back()->with('error' , trans('products.editing_error'));
        if($request->hasFile('image')) {
            $product->image = basename($request->file('image')->store('products'));
            $product->save();
        }

        if($request->hasFile('images')) {
            $images = [];
            for ($i = 0; $i <count($request->images) ; $i++) {
                $images[] = new ProductImage([
                    'product_id' => $product->id ,
                    'image' => basename($request->file('images.'.$i)->store('products')) ,  
                ]);
            }
            $product->images()->saveMany($images);
        }

        return redirect()->back()->with('success' , trans('products.editing_success'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

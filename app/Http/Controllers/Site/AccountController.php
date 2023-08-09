<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
use App\Models\OrderReturn;
use App\Models\Income;
use App\Models\Withdrawals;
use App\Models\UserPoint;
use App\Http\Requests\Site\UpdateUserRequest;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('site.account' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_profile(UpdateUserRequest $request)
    {
        $user = Auth::user();
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return back()->with('success' , 'تم تعديل المف الشخصى بنجاح' );;
    }

    public function profile()
    {
        $user = Auth::user();
        return view('site.account' , compact('user'));
    }

    public function orders()
    {
        return view('site.orders');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success' , 'تم تسجيل الخروج بنجاح' );
    }


    public function create_return(Order $order)
    {
        return view('site.create_return' , compact('order'));
    }


    public function store_return(Request $request ,Order $order)
    {

        for ($i=0; $i <count($request->products) ; $i++) { 
            $return = new OrderReturn;
            $return->order_id  = $order->id;
            $return->user_id = Auth::id();
            $return->product_id = $request->products[$i];
            $return->return_reason = $request->return_reason[$i];
            $return->save();
        }
            return redirect()->back()->with('success' , 'تم تقديم طلب الارجاع بنجاح' );
    }


    public function incomes()
    {
        return view('site.incomes');
    }

    public function wishlist()
    {
        return view('site.wishlist');
    }


    public function withdrawals()
    {
        $withdrawals = Withdrawals::where('user_id' , Auth::id())->latest()->get();
        return view('site.withdrawals' , compact('withdrawals'));
    }

    public function statistics()
    {
        $orders_count = Order::where('user_id' , Auth::id() )->count();
        $total_incomes = Income::where('user_id' , Auth::id() )->sum('amount');
        $total_incomes_withdrawald = Income::where('user_id' , Auth::id() )->where('withdrawn' , 1 )->sum('amount');
        $total_incomes_not_withdrawald =  Income::where('user_id' , Auth::id() )->where('withdrawn' , 0 )->sum('amount');

        $total_points = UserPoint::where('user_id' , Auth::id() )->sum('points');
        return view('site.statistics' , compact('orders_count' ,   'total_incomes_not_withdrawald' ,  'total_incomes' , 'total_incomes_withdrawald' , 'total_points' ) );
    }

    public function create_withdrawal()
    {
        $total_incomes_not_withdrawald =  Income::where('user_id' , Auth::id() )->where('withdrawn' , 0 )->sum('amount');
        return view('site.create_withdrawal' , compact('total_incomes_not_withdrawald'));

        
    }


    public function store_withdrawal(Request $request)
    {
        $total_incomes_not_withdrawald =  Income::where('user_id' , Auth::id() )->where('withdrawn' , 0 )->sum('amount');
        $withdrawal = new Withdrawals;
        $withdrawal->user_id = Auth::id();
        $withdrawal->amount = $total_incomes_not_withdrawald;
        $withdrawal->number = time();
        $withdrawal->phone = $request->phone;
        $withdrawal->status = 1;
        $withdrawal->save();
        return redirect(route('site.withdrawals'))->with('success' , 'تم انشاء الطلب بنجاح' );
    }

    public function withdrawal(Withdrawals $withdrawal)
    {
        return view('site.withdrawal' , compact('withdrawal'));
    }


    public function wallet()
    {
         $total_incomes_withdrawald =  Income::where('user_id' , Auth::id() )->where('withdrawn' , 0 )->sum('amount');
        return view('site.wallet' , compact('total_incomes_withdrawald') );
        
    }

}

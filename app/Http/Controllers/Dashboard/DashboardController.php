<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderReturn;
use App\Models\Expenses;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders_count = Order::whereDate('created_at' , today() )->count();
        $orders_return_count = OrderReturn::whereDate('created_at' , today() )->count();
        $orders_total_income = Order::whereDate('created_at' , today() )->sum('total');
        $expenses_this_month = Expenses::whereMonth('created_at' , now()->month )->sum('money');

        $marketers_count = User::where('type' , 1 )->count();
        $products_count = Product::count();
        $categories_count = Category::count();
        $brands_count = Brand::count();

        $most_returnd_products = Product::where('return_count' , '!=' , 0 )->orderBy('return_count' , 'DESC' )->take(10)->get();
        $most_sales_products = Product::where('sales_count' , '!=' , 0 )->orderBy('sales_count' , 'DESC' )->take(10)->get();
        $most_income_marketers = User::where('type' ,1 )->orderBy('total_incomes' , 'DESC' )->take(10)->get();
        $most_order_marketers = User::where('type' ,1 )->orderBy('orders_count' , 'DESC' )->take(10)->get();
        $most_return_marketers = User::where('type' ,1 )->orderBy('returns_count' , 'DESC' )->take(10)->get();


        return view('dashboard.index' , compact('orders_count' , 'most_return_marketers' , 'most_order_marketers' , 'most_income_marketers' , 'most_sales_products' , 'most_returnd_products' , 'brands_count' , 'categories_count' , 'marketers_count' , 'products_count' , 'expenses_this_month' , 'orders_total_income' , 'orders_return_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

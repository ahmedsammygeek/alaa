<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\SlideController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\MessageController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\BankAccountController;
use App\Http\Controllers\Dashboard\WarehouseController;
use App\Http\Controllers\Dashboard\BranchController;
use App\Http\Controllers\Dashboard\UnitController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\MarketerController;
use App\Http\Controllers\Dashboard\MarketerIncomeController;
use App\Http\Controllers\Dashboard\GovernorateController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\CouponController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ComplainController;
use App\Http\Controllers\Site\ContactUsController;
use App\Http\Controllers\Site\AccountController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Site\GoogleAuthController;
use App\Http\Controllers\Site\FacebookAuthController;
use App\Http\Controllers\Site\PhoneVerificationController;
use App\Http\Controllers\Dashboard\WithdrawalsController;
use App\Http\Controllers\Dashboard\ProductVariationController;
use App\Http\Controllers\Dashboard\CountryContoller;
use App\Http\Controllers\Dashboard\AjaxController;
use App\Http\Controllers\Dashboard\ExpensesController;
use App\Http\Controllers\Dashboard\ChallengeController;
use App\Http\Controllers\Dashboard\UserChallengeController;
use App\Http\Controllers\Testcontroller;
Route::get('/test' , [TestController::class , 'index'] );
Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'web' ]
    ], function(){ 


        Route::get('/Dashboard/login' , [AuthController::class , 'form'])->name('dashboard.login_form');
        Route::post('/Dashboard/login' , [AuthController::class , 'login'])->name('dashboard.login');

        require __DIR__.'/auth.php';

        Route::group(['prefix' => 'Dashboard' , 'as' => 'dashboard.' , 'middleware' => ['admin'] ], function() {
            Route::get('/',  [DashboardController::class , 'index'] )->name('index');
            Route::resource('admins', AdminController::class);
            Route::resource('categories', CategoryController::class);
            Route::resource('brands', BrandController::class);
            Route::resource('slides', SlideController::class);
            Route::resource('pages', PageController::class);
            Route::resource('units', UnitController::class);
            Route::resource('products', ProductController::class);
            Route::resource('bank_accounts', BankAccountController::class);
            Route::resource('warehouses', WarehouseController::class);
            Route::resource('branches', BranchController::class);
            Route::resource('marketers', MarketerController::class);
            Route::resource('governorates', GovernorateController::class);
            Route::resource('cities', CityController::class);
            Route::resource('coupons', CouponController::class);
            Route::resource('orders', OrderController::class);
            Route::resource('complains', ComplainController::class);
            Route::resource('withdrawals', WithdrawalsController::class);
            Route::resource('countries', CountryContoller::class);
            Route::resource('expenses', ExpensesController::class);
            Route::resource('challenges', ChallengeController::class);
            Route::get('settings' , [SettingsController::class , 'edit'])->name('settings.edit');
            Route::patch('settings' , [SettingsController::class , 'update'])->name('settings.update');
            Route::get('messages' , [MessageController::class , 'index'])->name('messages.index');
            Route::get('messages/{message}' , [MessageController::class , 'show'])->name('messages.show');
            Route::get('profile' , [ProfileController::class , 'profile'] )->name('profile');
            Route::patch('profile' , [ProfileController::class , 'update'] )->name('profile.update');
            Route::get('password' , [ProfileController::class , 'password'] )->name('password');
            Route::patch('password' , [ProfileController::class ,'update_password'] )->name('password.update');
            Route::get('/marketers/{marketer}/incomes' , [MarketerIncomeController::class  , 'index' ] )->name('marketers.incomes.index');
            Route::get('warehouses/{warehouse}/excel' , [WarehouseController::class , 'excel'] )->name('warehouse.excel');

            Route::get('products/{product}/variations/create'  , [ProductVariationController::class , 'create'] )->name('products.variations.create');
            Route::post('products/{product}/variations'  , [ProductVariationController::class , 'store'] )->name('products.variations.store');
            Route::post('/get_new_varition_main_row' , [AjaxController::class , 'get_new_varition_main_row'] )->name('get_new_varition_main_row');

            Route::post('/get_new_varition_color_row' , [AjaxController::class , 'get_new_varition_color_row'] )->name('get_new_varition_color_row');

            Route::get('withdrawals/{withdrawal}/approve' , [WithdrawalsController::class , 'approve'] )->name('withdrawals.approve');
            Route::get('withdrawals/{withdrawal}/deny' , [WithdrawalsController::class , 'deny'] )->name('withdrawals.deny');


            Route::get('marketers/{marketer}/orders' , [MarketerController::class , 'orders'] )->name('marketers.orders');
            Route::get('marketers/{marketer}/returns' , [MarketerController::class , 'returns'] )->name('marketers.returns');
            Route::get('marketers/{marketer}/statistics' , [MarketerController::class , 'statistics'] )->name('marketers.statistics');
            Route::get('marketers/{marketer}/withdrawals' , [MarketerController::class , 'withdrawals'] )->name('marketers.withdrawals');
            Route::get('marketers/{marketer}/challenges' , [UserChallengeController::class , 'index'] )->name('marketers.challenges');
            Route::get('marketers/{marketer}/challenges/{user_challenge}' , [UserChallengeController::class , 'show'] )->name('marketers.challenges.show');
            Route::get('/marketers/{marketer}/login' , [MarketerController::class , 'login'] )->name('marketers.login');
        });

Route::get('verify/phone' , [PhoneVerificationController::class , 'index' ] )->name('site.verify_phone');
Route::post('verify/phone' , [PhoneVerificationController::class , 'store' ] )->name('site.verify_phone.store');
Route::post('/register' , [SiteController::class , 'store_register'])->name('site.register');
Route::get('/google' , [GoogleAuthController::class , 'index'] )->name('google');
Route::get('/google/callable' , [GoogleAuthController::class , 'store'] );
Route::get('/facebook' , [FacebookAuthController::class , 'index'] );
Route::get('/facebook/callable' , [FacebookAuthController::class , 'store'] );
Route::get('logout' , [AccountController::class , 'logout'])->name('user.logout');
Route::get('/login' , [SiteController::class , 'login'] )->name('login');
Route::post('login' , [SiteController::class , 'login_system'] )->name('login_system');
Route::get('/register' , [SiteController::class , 'register'] )->name('register');
Route::get('/phone' , [SiteController::class , 'phone'] )->name('site.phone');
Route::patch('/phone' , [SiteController::class , 'update_phone'] )->name('site.phone.update');

Route::group(['middleware' => 'verify_phone'], function() {
    Route::get('/' , [SiteController::class , 'index'] )->name('site.index');
    Route::get('/products/{product}' , [SiteController::class , 'product'] )->name('site.products.show');
    Route::get('/products' , [SiteController::class , 'products'] )->name('site.products.index');
    Route::get('/category' , [SiteController::class , 'category'] )->name('site.category');
    // Route::get('/account' , [SiteController::class , 'account'])->name('site.account');
    // Route::get('/account/orders' , [SiteController::class , 'orders'])->name('account.orders.index');
    Route::get('pages/{page}' , [SiteController::class , 'page'])->name('pages.show');
    Route::get('/categories/{category}/products' , [SiteController::class , 'category_products'])->name('category.products');

    Route::get('search' , [SiteController::class , 'search'])->name('search');
    Route::get('/cart' , [SiteController::class , 'cart'])->name('cart');


    Route::get('products/{product}/images/download' , [SiteController::class , 'downloadProductImages'] )->name('product.images.download');

    Route::get('/complains' , [SiteController::class , 'complains'])->name('complains');
    Route::post('/complains' , [SiteController::class , 'store_complains'])->name('complains.store');
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/profile' , [AccountController::class , 'profile'] )->name('site.account');
        Route::patch('/profile' , [AccountController::class , 'update_profile'] )->name('site.account.update');
        Route::get('/checkout' , [SiteController::class , 'checkout'] )->name('checkout.index');
        Route::post('/checkout' , [SiteController::class , 'save_order'] )->name('checkout.save');

        Route::get('orders' , [AccountController::class , 'orders'] )->name('site.orders.index');
        Route::get('orders/{order:number}/returns/create' , [AccountController::class , 'create_return'] )->name('site.orders.returns.create');
        Route::post('orders/{order:number}/returns' , [AccountController::class , 'store_return'] )->name('site.orders.returns.store');
        Route::get('wishlist' , [AccountController::class , 'wishlist'] )->name('site.wishlist');
        Route::get('incomes' , [AccountController::class , 'incomes'])->name('site.incomes');
        Route::get('statistics' , [AccountController::class , 'statistics'])->name('site.statistics');
        Route::get('withdrawals/create' , [AccountController::class , 'create_withdrawal'])->name('site.withdrawals.create');

        Route::post('/withdrawals' , [AccountController::class , 'store_withdrawal'])->name('site.withdrawals.store');

        Route::get('withdrawals' , [AccountController::class , 'withdrawals'])->name('site.withdrawals');
        Route::get('withdrawals/{withdrawal}' , [AccountController::class , 'withdrawal'])->name('site.withdrawals.show');
        Route::get('/wallet' , [AccountController::class , 'wallet'] )->name('site.wallet');
    });

});

});
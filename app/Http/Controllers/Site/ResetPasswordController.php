<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhoneVerificationCode;
use App\Models\User;
use Hash;
use App\Http\Requests\Site\ResetPassword\CheckNewPasswordRequest;
class ResetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        $check = PhoneVerificationCode::where('opreation_id' , $request->opreation_id )->first();

        if (!$check) {
            return redirect(route('site.index'));
        }
        $opreation_id = $request->opreation_id;
        return view('site.reset_password' , compact('opreation_id') )->with('success' , 'برجاء انشاء كلمه المرور الجديده' );

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckNewPasswordRequest $request)
    {
        $check = PhoneVerificationCode::where('opreation_id' , $request->opreation_id )->first();

        // dd($check);

        if (!$check) {
            return back()->with('error' , 'حدث خطا حاول مره اخرى' );
        }

        $user = User::where('phone' , $check->phone )->first();

        if (!$user) {
            return back()->with('error' , 'حدث خطا حاول مره اخرى' );
        }

        $user->password = Hash::make($request->password);
        $user->save();
        $check->delete();


        return redirect(route('login'))->with('success' , 'تم اعداه تعيين كلمه المرور بنجاح' );

    }
}

<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Site\ForgetPassword\CheckMobileRequest;
use App\Http\Requests\Site\ForgetPassword\CheckCodeRequest;
use App\Models\User;
use App\Jobs\SendVerificationCodeToViaPhoneNumberJob;
use App\Models\PhoneVerificationCode;
use Str;
class ForgetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        return view('site.forget_password');
    }


    public function send_code(CheckMobileRequest $request) 
    {
        $check = User::where('phone' , $request->mobile )->first();
        if (!$check) {
            return back()->with('error' , 'تم ارسال كود التحقق بنجاح' );
        }
        dispatch(new SendVerificationCodeToViaPhoneNumberJob($request->mobile))->onConnection('sync');

        return redirect(route('forget_password.verify_phone' , $request->mobile ))->with('success' , 'تم ارسال كود التحقق بنجاح' );
    }


    public function verify_phone(Request $request , $mobile )
    {
        return view('site.forget_password_verify_phone' , compact('mobile') );
    }


    public function verify(CheckCodeRequest $request)
    {
        $verify = PhoneVerificationCode::where([
            ['code' , '=' , $request->code ] , 
            ['phone' , '=' , $request->mobile ] , 
        ])->first();

        if (!$verify) {
            return back()->with('error' , 'الكود غير صحيح' );
        }

        $verify->opreation_id = Str::uuid()->toString();
        $verify->save();

        return redirect(route('reset_password.index' , [ 'opreation_id' => $verify->opreation_id] ))->with('success' , 'تم التحقق من رقم الموبيل' );
    }

}

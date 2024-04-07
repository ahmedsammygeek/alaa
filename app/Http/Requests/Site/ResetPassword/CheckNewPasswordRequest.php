<?php

namespace App\Http\Requests\Site\ResetPassword;

use Illuminate\Foundation\Http\FormRequest;

class CheckNewPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|confirmed' , 
            'opreation_id' => 'required' , 
        ];
    }
}

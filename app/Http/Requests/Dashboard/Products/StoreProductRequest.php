<?php

namespace App\Http\Requests\Dashboard\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'barcode' => 'required',
            'name.ar' => 'required', 
            'name.en' => 'required', 
            'category_id' => 'required' , 
            'brand_id' => 'nullable' , 
            'description.ar' => 'nullable' ,  
            'description.en' => 'nullable' ,  
            'min_description.ar' => 'nullable' , 
            'min_description.en' => 'nullable' , 
            'image' => 'nullable|image' , 
            'images' => 'nullable'  , 
            'images.*' => 'image' , 
            'marketer_price' => 'required' , 
            'price' => 'required' , 
            'price_after_discount' => 'nullable' , 
            'discount_percentage' => 'nullable' , 
            'warehouses' => 'nullable' , 
            'quantity' => 'nullable' , 
            'points' => 'nullable' , 
            'minimam_gomla_number' => 'nullable' , 
            'minimam_stock_alert' => 'required' , 
            'country_id' => 'required' , 
            'min_price' => 'required' , 
            'max_price' => 'required' , 
        ];
    }
}

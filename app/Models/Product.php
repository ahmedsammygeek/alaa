<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Spatie\Translatable\HasTranslations;
class Product extends Model
{


    use HasFactory;
    use HasTranslations;
    public $translatable = ['name' , 'description' , 'mini_description' ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function variations()
    {
        return $this->hasMany(Variation::class , 'product_id');
    }


    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function add($data)
    {
        $this->setTranslation('name' , 'ar' , $data['name']['ar']);
        $this->setTranslation('name' , 'en' , $data['name']['en']);
        $this->setTranslation('mini_description' , 'ar' , $data['mini_description']['ar']);
        $this->setTranslation('mini_description' , 'en' , $data['mini_description']['en']);
        $this->setTranslation('description' , 'ar' , $data['description']['ar']);
        $this->setTranslation('description' , 'en' , $data['description']['en']);
        $this->category_id = $data['category_id'];
        $this->brand_id = $data['brand_id'];
        $this->marketer_price = $data['marketer_price'];
        $this->price = $data['price'];
        $this->price_after_discount = $data['price_after_discount'];
        $this->discount_percentage = $data['discount_percentage'];
        $this->barcode = $data['barcode'];
        $this->points = $data['points'];
        $this->minimam_gomla_number = $data['minimam_gomla_number'];
        $this->minimam_stock_alert = $data['minimam_stock_alert'];
        $this->country_id = $data['country_id'];
        $this->min_price = $data['min_price'];
        $this->max_price = $data['max_price'];
        $this->user_id = Auth::id();
        return $this->save();
    }

    public function edit($data)
    {
        $this->setTranslation('name' , 'ar' , $data['name']['ar']);
        $this->setTranslation('name' , 'en' , $data['name']['en']);
        $this->setTranslation('mini_description' , 'ar' , $data['mini_description']['ar']);
        $this->setTranslation('mini_description' , 'en' , $data['mini_description']['en']);
        $this->setTranslation('description' , 'ar' , $data['description']['ar']);
        $this->setTranslation('description' , 'en' , $data['description']['en']);
        $this->category_id = $data['category_id'];
        $this->brand_id = $data['brand_id'];
        $this->marketer_price = $data['marketer_price'];
        $this->price = $data['price'];
        $this->price_after_discount = $data['price_after_discount'];
        $this->discount_percentage = $data['discount_percentage'];
        $this->active = isset($data['active']) ? 1 : 0;
        $this->barcode = $data['barcode'];
        $this->points = $data['points'];
        $this->minimam_gomla_number = $data['minimam_gomla_number'];
        $this->minimam_stock_alert = $data['minimam_stock_alert'];
        $this->country_id = $data['country_id'];
        $this->min_price = $data['min_price'];
        $this->max_price = $data['max_price'];
        return $this->save();
    }

    public function url()
    {
        return url('products/'.$this->id.'-'.$this->name);
    }

    public function warehouses()
    {
        return $this->hasMany(WarehouseProduct::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }


    public function getPrice()
    {
        if ($this->price_after_discount) {
            return $this->price_after_discount;
        }

        return $this->price;
    }

    public function hasDiscount() {

        if($this->price_after_discount)
            return true;

        return false;
    }

}

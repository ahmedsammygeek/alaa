<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use Auth;
use App\Models\Cart as CartModel;
class Cart extends Component
{

    protected $listeners = ['cartChanged' => '$refresh' ];

    public $subtotal;
    public $coupon;



    public function chackCoupon() {
        
    }

    public function removeItem($product_id) {

        $item = CartModel::where([
            ['product_id' , '=' , $product_id ] , 
            ['user_id' , '=' , Auth::id() ] , 
        ])->first();
        if ($item) {
            $item->delete();
            toastr()->success('تم حذف المنتج من السله بنجاح');
        }
        $this->emitSelf('cartChanged');

    }


    public function editQuantity($product_id , $quantity)
    {
        $item = CartModel::where([
            ['product_id' , '=' , $product_id ] , 
            ['user_id' , '=' , Auth::id() ] , 
        ])->first();
        if ($item) {
            $item->quantity = $quantity;
            $item->save();
            toastr()->success('تم تعديل المنتج من السله بنجاح');
        }
        $this->emitSelf('cartChanged');
    }




    public function render()
    {
        $items = CartModel::where('user_id' , Auth::id() )->get();
        $total = 0;
        foreach ($items as $item) {
            $total += ($item->quantity * $item->product?->price );
        }

        return view('livewire.site.cart' , compact('items' , 'total'));
    }
}

<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use Auth;
use App\Models\Cart as CartModel;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Cart extends Component
{
    use LivewireAlert;
    protected $listeners = ['cartChanged' => '$refresh' ];

    public $subtotal;
    public $coupon;



    public function chackCoupon() {
        
    }

    public function removeItem($item_id) {

        $item = CartModel::find($item_id);
        if ($item) {
            $item->delete();
            $this->alert( 'success' ,  'تم حذف المنتج من السله بنجاح');
        }
        $this->emitSelf('cartChanged');

    }


    public function editQuantity($item_id , $quantity)
    {
        $item = CartModel::find($item_id);
        if ($item) {
            $item->quantity = $quantity;
            $item->save();
            $this->alert( 'success' ,  'تم تعديل المنتج من السله بنجاح');
        }
        $this->emitSelf('cartChanged');
    }


    public function getTotalProperty() {
        $total = 0;
        $items = CartModel::where('user_id' , Auth::id() )->get();

        foreach ($items as $item) {
            
            $total += $item->quantity * $item->variation?->getPrice();
        }
        return $total;
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

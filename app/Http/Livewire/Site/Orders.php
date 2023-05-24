<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Order;
use Auth;
class Orders extends Component
{

    public $order;
    public $return_reason;
    public $description;
    public function cancelOrder($order_id)
    {
        $order = Order::find($order_id);
        if ($order) {
            $order->shipping_statues_id = 6;
            $order->save();
            toastr()->success('تم الغاء الطلب بنجاح');
        }
    }

    public function mount()
    {
        $this->order = new Order;
    }


    public function returnOrder($order_id)
    {
        $this->emit('showReturnOrderModal',$order_id);
    }

    public function saveReturnOrder($order_id)
    {
        dd($order_id , $this->description , $this->return_reason);
    }

    public function render()
    {
        $orders = Order::with(['items.product' , 'governorate' , 'status'])->where('user_id' , Auth::id() )->latest()->get();
        return view('livewire.site.orders' , compact('orders'));
    }
}

<?php

namespace App\Http\Livewire\Dashboard\Orders;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
class ListAllOrders extends Component
{
    use WithPagination;
    public $rows = 10;
    public $search = '';

    protected $listeners = ['deleteItem'];

 

    public function deleteItem($item_id)
    {
        $order = Order::find($item_id);
        $order->delete();
        $this->emit('itemDeleted');
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedRows()
    {
        $this->resetPage();
    }

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $orders = Order::query()->with(['user' , 'governorate' ]);

        if($this->search != '')
            $orders = $orders->where('number' , 'LIKE' , '%'.$this->search.'%');

        $orders = $orders->latest()->paginate($this->rows);


        return view('livewire.dashboard.orders.list-all-orders' , compact('orders'));
    }
}

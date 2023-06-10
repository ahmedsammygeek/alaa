<?php

namespace App\Http\Livewire\Dashboard\Orders;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use App\Models\ShippingStatus;
use App\Exports\Dashboard\Orders\OrdersExcelReportExport;
use Excel;
class ListAllOrders extends Component
{
    use WithPagination;
    public $rows = 10;
    public $search ;
    public $shipping_status = 'all' ;
    public $start_date;
    public $end_date;

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



    public function ExcelReport() {
        $orders = Order::when($this->search , function($query){
            $query->where('number' , 'LIKE' , '%'.$this->search.'%' );
        })
        ->when($this->shipping_status != 'all' , function($query){
            $query->where('shipping_statues_id' , $this->shipping_status );
        })
        ->when($this->start_date , function($query){
            $query->whereDate('created_at' , '>=' , $this->start_date );
        })
        ->when($this->end_date , function($query){
            $query->whereDate('created_at' , '<=' , $this->end_date );
        })->get();    

        return Excel::download(new OrdersExcelReportExport($orders), 'orders.xlsx');
    }

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $shipping_statues = ShippingStatus::all();
        $orders = Order::when($this->search , function($query){
            $query->where('number' , 'LIKE' , '%'.$this->search.'%' );
        })
        ->when($this->shipping_status != 'all' , function($query){
            $query->where('shipping_statues_id' , $this->shipping_status );
        })
        ->when($this->start_date , function($query){
            $query->whereDate('created_at' , '>=' , $this->start_date );
        })
        ->when($this->end_date , function($query){
            $query->whereDate('created_at' , '<=' , $this->end_date );
        })
        ->paginate($this->rows);


        return view('livewire.dashboard.orders.list-all-orders' , compact('orders' , 'shipping_statues'));
    }
}

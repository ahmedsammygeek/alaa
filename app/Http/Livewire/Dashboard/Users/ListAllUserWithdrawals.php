<?php

namespace App\Http\Livewire\Dashboard\Users;

use Livewire\Component;
use App\Models\Withdrawals;
use App\Models\ShippingStatus;
class ListAllUserWithdrawals extends Component
{
    public $user;
    public $rows = 10 ;
    public $search ;
    public $status = 'all' ;
    public $start_date;
    public $end_date;



    public function render()
    {
        $withdrawals = Withdrawals::where('user_id' , $this->user->id )
        ->when($this->search , function($query){
            $query->where('number' , 'LIKE' , '%'.$this->search.'%' );
        })
        ->when($this->status != 'all' , function($query){
            $query->where('status' , $this->status );
        })
        ->when($this->start_date , function($query){
            $query->whereDate('created_at' , '>=' , $this->start_date );
        })
        ->when($this->end_date , function($query){
            $query->whereDate('created_at' , '<=' , $this->end_date );
        })
        ->paginate($this->rows);
        return view('livewire.dashboard.users.list-all-user-withdrawals' , compact('withdrawals'));
    }
}

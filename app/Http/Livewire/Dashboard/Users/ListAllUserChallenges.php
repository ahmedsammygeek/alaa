<?php

namespace App\Http\Livewire\Dashboard\Users;

use Livewire\Component;
use App\Models\UserChallenge;
class ListAllUserChallenges extends Component
{
    public $user;
    public $rows = 10 ;
    public $search ;
    public $shipping_status = 'all' ;
    public $start_date;
    public $end_date;



    public function render()
    {
        $user_challenges = UserChallenge::where('user_id' , $this->user->id )
        // ->when($this->search , function($query){
        //     $query->where('number' , 'LIKE' , '%'.$this->search.'%' );
        // })
        // ->when($this->shipping_status != 'all' , function($query){
        //     $query->where('shipping_statues_id' , $this->shipping_status );
        // })
        // ->when($this->start_date , function($query){
        //     $query->whereDate('created_at' , '>=' , $this->start_date );
        // })
        // ->when($this->end_date , function($query){
        //     $query->whereDate('created_at' , '<=' , $this->end_date );
        // })
        ->paginate($this->rows);
        return view('livewire.dashboard.users.list-all-user-challenges' , compact( 'user_challenges'));
    }
}

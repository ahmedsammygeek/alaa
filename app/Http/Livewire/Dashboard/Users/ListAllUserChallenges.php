<?php

namespace App\Http\Livewire\Dashboard\Users;

use Livewire\Component;
use App\Models\UserChallenge;
class ListAllUserChallenges extends Component
{
    public $user;
    public $rows = 10 ;
    public $search ;
    public $status = 'all' ;
    public $start_date;
    public $end_date;



    public function render()
    {
        $user_challenges = UserChallenge::where('user_id' , $this->user->id )
        ->when($this->status != 'all' , function($query){
            $query->where('status' , $this->status );
        })

        ->paginate($this->rows);
        return view('livewire.dashboard.users.list-all-user-challenges' , compact( 'user_challenges'));
    }
}

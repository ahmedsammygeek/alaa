<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\WithdrawalStatusHistory;
use Auth;
class AddHistoryToWithdrawalJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $withdrawals;
    public $newStatus;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($withdrawals , $newStatus )
    {
        $this->withdrawals = $withdrawals;
        $this->newStatus = $newStatus;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->withdrawals as $withdrawal) {
            WithdrawalStatusHistory::create([
                'withdrawal_id' => $withdrawal , 
                'status' => $this->newStatus , 
                'user_id' => Auth::id() , 
            ]);
        }
    }
}

<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\UserPoint;
use App\Models\Variation;
use Carbon\Carbon;
class AddPointsToUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $variation_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($variation_id)
    {
        $this->variation_id = $variation_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $variation = Variation::find($this->variation_id);
        if ($variation) {
            if ($variation?->product->points) {
                $user_points = new UserPoint;
                $user_points->points = $variation?->product->points;
                $user_points->user_id = Auth::id();
                $user_points->order_id = $this->order_id;
                $user_points->product_id = $variation->product->id;
                $user_points->status = 1;
                $user_points->can_withdrawal_when =Carbon::today()->subDays($data['settings']->days_to_valid_marketer_money);
                $user_points->save();
            }
        }
    }
}

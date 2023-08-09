<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Income;
use App\Models\Variation;
use App\Models\Settings;
use Carbon\Carbon;
class AddMoneyToUserIncomeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $variation_id;
    public $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($variation_id , $order)
    {
        $this->order = $order;
        $this->variation_id = $variation_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $settings = Settings::first();
        $variation = Variation::find($this->variation_id);
        if ($variation) {
            $user_income = new Income;
            $user_income->amount = $variation?->product->marketer_price;
            $user_income->user_id = $this->order->user_id;
            $user_income->order_id = $this->order->id;
            $user_income->product_id = $variation->product->id;
            $user_income->withdrawn = 0;
            $user_income->can_withdrawal_when = Carbon::today()->subDays($settings->days_to_valid_marketer_money);
            $user_income->save();
        }
    }
}

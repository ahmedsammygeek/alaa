<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawals extends Model
{
    use HasFactory;
    public const PENDING = 1;
    public const PROCESSING = 2;
    public const APPROVED = 3;
    public const REFUSED = 4;

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class , 'payment_method_id');
    }
   
}

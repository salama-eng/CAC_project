<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function payment_methode()
    {
        return $this->belongsTo(Paymentmethode::class,'payment_id');
    }
}

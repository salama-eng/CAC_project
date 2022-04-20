<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethode extends Model
{
    use HasFactory;

    public function companies(){
        return $this->belongsTo(companies::class,'company_id');
    }
    public function user()
    {
        return $this->belongsTo(Paymentmethode::class);
    }
}




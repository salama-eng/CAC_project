<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    public function post(){
        return $this->belongsTo(post::class,'post_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}

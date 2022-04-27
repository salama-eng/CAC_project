<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    public function post(){
        return $this->hasOne(post::class,'post_id');
    }
    public function user(){
        return $this->hasOne(User::class,'user_id');
    }
}

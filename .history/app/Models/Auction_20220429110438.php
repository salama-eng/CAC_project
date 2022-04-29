<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    public function auction_post(){
        return $this->belongsTo(post::class,'post_id');
    }
    public function userOwner(){
        return $this->belongsTo(User::class,'Owner_user_id');
    }
    public function userAw(){
        return $this->belongsTo(User::class,'aw_user_id');
    }
    
    
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function model(){
        return $this->belongsTo(Models::class,'model_id');
    }

    public function auctions()
    {
        return $this->hasMany(Auction::class ,'post_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'owner_user_id');
    }
}

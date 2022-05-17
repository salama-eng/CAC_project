<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about_us extends Model
{
    
    use HasFactory;
    protected $table ="about_us";

    protected $fillable = [
        'description',
        'paragraph_one',
        'paragraph_two',
    ];
}

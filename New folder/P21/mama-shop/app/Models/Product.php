<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','category_id','user_id'];
    function user(){
        return $this->belongsTo(User::class);
    }
    function category(){
        return $this->belongsTo(Category::class);
    }
}

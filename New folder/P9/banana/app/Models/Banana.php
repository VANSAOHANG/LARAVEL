<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banana extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'price',
        'status',
        'image'
    ];
    protected $casts=[
        "status" => 'boolean',
        "created_at"=>"date: d , l m Y H:i:s A"
    ];
    protected $hidden= [
        'updated_at'
    ];
}

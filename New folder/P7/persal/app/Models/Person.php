<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $fillable = ['name', "email", "password", "random_date", "photo"];
    protected $casts = [
        "status" => 'boolean',
        "random_date"=>"date: d , l m Y H:i:s A",
        "created_at"=>"date: d , l m Y H:i:s A"
    ];
    protected $hidden = ["updated_at", "password"];
    
}

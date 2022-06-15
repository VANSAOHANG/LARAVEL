<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        "post_id",
        "user_id",
        "text"
    ];
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}

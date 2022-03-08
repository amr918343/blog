<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    // Properties and constants
    const LIKE_COUNT = 180;

    protected $fillable = [
        'status',
        'user_id',
        'post_id',
    ];

    // Reverse relationships
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    // Properties and constants
    const POST_COUNT = 30;

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    // Relationships
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Reverse relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // // Special methods [accessors, mutators, scopes, etc]
    public function isAuthUserLikedPost() {
        return $this->likes()->where('user_id', auth()->user()->id)->exists();
    }
}

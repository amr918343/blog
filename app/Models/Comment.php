<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Comment extends Model
{
    use HasFactory;
    
    // Properties and constants
    const COMMENT_COUNT = 100;

    protected $fillable = [
        'body',
        'user_id',
        'post_id',
    ];

    // Reverse relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Special methods [accessors, mutators, scopes, etc]
}

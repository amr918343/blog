<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    // Relationships
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    
    public function likes() {
        return $this->hasMany(Like::class);
    }

    // Reverse relationships
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Polymorphic relationships
    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostNotification extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'slug', 'created_at'];
    public $timestamps = false;
}

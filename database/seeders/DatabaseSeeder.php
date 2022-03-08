<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Post;
use \App\Models\Comment;
use \App\Models\Like;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(User::USER_COUNT)->create();
        Post::factory(Post::POST_COUNT)->create();
        Comment::factory(Comment::COMMENT_COUNT)->create();
        Like::factory(Like::LIKE_COUNT)->create();
    }
}

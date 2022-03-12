<?php

namespace App\Providers;

use App\BusinessLogic\CommentService;
use App\BusinessLogic\Interfaces\ICommentService;
use App\BusinessLogic\Interfaces\ILikeService;
use App\BusinessLogic\Interfaces\INotificationService;
use App\BusinessLogic\Interfaces\IPostService;
use App\BusinessLogic\LikeService;
use App\BusinessLogic\NotificationService;
use App\BusinessLogic\PostService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $this->app->bind(ILikeService::class, LikeService::class);
        $this->app->bind(IPostService::class, PostService::class);
        $this->app->bind(INotificationService::class, NotificationService::class);
        $this->app->bind(ICommentService::class, CommentService::class);
    }
}

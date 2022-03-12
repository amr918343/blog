<?php
namespace App\BusinessLogic\Interfaces;

use App\Models\CommentNotification;
use App\Models\PostNotification;

interface INotificationService {
    public function addPost(PostNotification $notification);
    public function addComment(CommentNotification $notification);
}
<?php
namespace App\BusinessLogic;
use App\BusinessLogic\Interfaces\INotificationService;
use Illuminate\Http\Request;
use App\Models\PostNotification;
use App\Models\CommentNotification;

class NotificationService implements INotificationService {
    
    public function addPost(PostNotification $notification) {
        
        if(!is_null($notification))
            $notification->save();
    }
    public function addComment(CommentNotification $notification) {
        if(!is_null($notification))
            $notification->save();
    }
}

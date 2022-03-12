<?php

namespace App\BusinessLogic;

use App\BusinessLogic\Interfaces\ICommentService;
use App\Http\Requests\CommentRequest;
use App\Events\CommentNotification;
use App\Models\CommentNotification as Notification;
use App\Models\Comment;
use App\Traits\MessageTrait;
class CommentService implements ICommentService
{

    use MessageTrait;

    public function add(CommentRequest $request, $id)
    {
        try {
            $comment = new Comment();
            $comment->body = $request->body;
            $comment->user_id = auth()->user()->id;
            $comment->post_id = $id;
            $comment->save();

            $creator = $comment->post()->with('user')->first()->user()->first();
            $creatorId = $creator->id;
            // make data for event
            $data = [
                'creatorId' => $creatorId,
                'userName' => auth()->user()->name,
                'postSlug' => $comment->post->slug,
            ];

            $notification = new Notification();
            $notification->user_id = $data['creatorId'];
            $notification->name = $data['userName'];
            $notification->slug = $data['postSlug'];
            
            // fire CommentNotification event
            event(new CommentNotification($data));

            return response()->json(['commentUserName' => auth()->user()->name, 'commentBody' => $comment->body, 'commentCreatedAt' => $comment->created_at->diffForHumans(), 'creatorId' => $creatorId]);
        } catch (\Exception $exp) {
            return $this->redirectBackWithMessage('error', 'Unhandeled error on commenting');
        }
    }
}

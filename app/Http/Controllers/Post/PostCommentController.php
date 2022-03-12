<?php

namespace App\Http\Controllers\Post;

use App\Events\CommentNotification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\CommentNotification as Notification;
use App\Traits\MessageTrait;

class PostCommentController extends Controller
{
    use MessageTrait;
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, $id)
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
            
            // fire CommentNotification event
            event(new CommentNotification($data));

            return response()->json(['commentUserName' => auth()->user()->name, 'commentBody' => $comment->body, 'commentCreatedAt' => $comment->created_at->diffForHumans(), 'creatorId' => $creatorId]);
        } catch (\Exception $exp) {
            return $this->redirectBackWithMessage('error', 'Unhandeled error on commenting');
        }
    }

}

<?php

namespace App\Http\Controllers\Post;

use App\Events\CommentNotification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

use App\Traits\MessageTrait;

class PostCommentController extends Controller
{
    use MessageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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

            // make data for event
            $data = [
                'userName' => auth()->user()->name,
                'postSlug' => $comment->post()->slug,
            ];
            
            // fire CommentNotification event
            broadcast(new CommentNotification($data));

            return $this->redirectBackWithMessage('success', 'Comment Created Successfully');
        } catch (\Exception $exp) {
            return $this->redirectBackWithMessage('error', 'Unhandeled error on commenting');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

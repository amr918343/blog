<?php

namespace App\Http\Controllers\User;

use App\Events\PostNotification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\PostRequest;
use App\Traits\MessageTrait;
use App\Models\PostNotification as Notification;
use App\Models\Post;

class UserPostController extends Controller
{
    use MessageTrait;
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
    public function store(PostRequest $request)
    {
        // try {
        // store post in database
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($post->title);
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        $post->save();

        $userName = auth()->user()->name;
        $data = [
            'userId' => auth()->user()->id,
            'userName' => $userName,
            'postSlug' => $post->slug,
        ];

        // Store data in post_notifications table
        $notification = new Notification();
        $notification->user_id = $data['userId'];
        $notification->name = $data['userName'];
        $notification->slug = $data['postSlug'];
        $notification->save();
        
        event(new PostNotification($data));

        return $this->message('user.post.show', 'success', 'Post Created Successfully');
        // } catch(\Exception $exp) {
        // return $this->message('user.post.show', 'error', 'Unhandeled error found, try again later');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user_posts = auth()->user()->posts()->paginate(self::PAGE_COUNTER);
        return view('users.profile', compact('user_posts'));
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
    public function update(PostRequest $request, $id)
    {
        try {
            $post = Post::findOrFail($id);
            if ($post) {
                $post->title = $request->title;
                $post->body = $request->body;
                $post->save();
                return $this->message('user.post.show', 'success', 'Post Updated successfully');
            } else {
                return $this->message('user.post.show', 'error', 'Problem on updating post');
            }
        } catch (\Exception $exp) {
            return $this->message('user.post.show', 'error', 'Unhandeled problem on updating post, please try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // check if the sent post exist
        if ($post) {
            // delete post
            $post->delete();
            // send success message
            return $this->message('user.post.show', 'success', 'Post Deleted Successfully');
        } else {
            // send falilure message
            return $this->message('user.post.show', 'error', 'Problem on deleting post');
        }
    }
}

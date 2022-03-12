<?php
namespace App\BusinessLogic;

use App\BusinessLogic\Interfaces\INotificationService;
use App\BusinessLogic\Interfaces\IPostService;
use App\Events\PostNotification;
use Illuminate\Support\Str;
use App\Http\Requests\PostRequest;
use App\Traits\MessageTrait;
use App\Models\PostNotification as Notification;
use App\Models\Post;


class PostService implements IPostService {
    use MessageTrait;

    private INotificationService $_notificationService;

    public function __construct(INotificationService $notificationService)
    {
        $this->_notificationService = $notificationService;
    }


    public function getAll($page_counter) {
        $posts = Post::paginate($page_counter);
        return $posts;
    }


    public function getOne($slug) {
        $post = Post::where('slug', $slug)->first();
        if ($post) {
            $post_user = $post->user()->first();
            $post_comments = $post->comments()->with('user')->get();

            return view('posts.show', compact('post', 'post_user', 'post_comments'));
        } else {
            abort(404);
        }
    }
    
    public function add(PostRequest $request) {
        try {
            // store post in database
            $post = new Post();
            $post->title = $request->title;
            $post->slug = Str::slug($post->title);
            $post->body = $request->body;
            $post->user_id = auth()->user()->id;
            $post->save();

            $userName = auth()->user()->name;
            
            // notification data 
            $data = [
                'userId' => auth()->user()->id,
                'userName' => $userName,
                'postSlug' => $post->slug,
                'postCreatedAt' => $post->created_at->diffForHumans(),
            ];

            // Store data in post_notifications table
            $notification = new Notification();
            $notification->user_id = $data['userId'];
            $notification->name = $data['userName'];
            $notification->slug = $data['postSlug'];
            $this->_notificationService->addPost($notification);

            
            broadcast(new PostNotification($data))->toOthers();

            return $this->message('user.posts.show', 'success', 'Post Created Successfully');
        } catch (\Exception $exp) {
            return $this->message('user.posts.show', 'error', 'Unhandeled error found, try again later');
        }
    }

    public function getUserPosts($page_counter) {
        $user_posts = auth()->user()->posts()->paginate($page_counter);
        return $user_posts;
    }

    public function update(PostRequest $request, $id) {
        try {
            $post = Post::findOrFail($id);
            if ($post) {
                $post->title = $request->title;
                $post->body = $request->body;

                if ($post->isDirty())
                    $post->save();
                else
                    return $this->message('user.posts.show', 'error', 'There is no change in data');

                return $this->message('user.posts.show', 'success', 'Post Updated successfully');
            } else {
                return $this->message('user.posts.show', 'error', 'Problem on updating post');
            }
        } catch (\Exception $exp) {
            return $this->message('user.posts.show', 'error', 'Unhandeled problem on updating post, please try again later');
        }
    }
    public function delete($id) {
        
        $post = Post::findOrFail($id);

        // check if the sent post exist
        if ($post) {
            // delete post
            $post->delete();
            // send success message
            return $this->message('user.posts.show', 'success', 'Post Deleted Successfully');
        } else {
            // send falilure message
            return $this->message('user.posts.show', 'error', 'Problem on deleting post');
        }
    }
}

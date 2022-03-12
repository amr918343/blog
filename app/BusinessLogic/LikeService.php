<?php
namespace App\BusinessLogic;
use App\BusinessLogic\Interfaces\ILikeService;
use Illuminate\Http\Request;
use App\Models\Like;

class LikeService implements ILikeService {
    public function toggleLike(Request $request) : int {
        if ($request->status) {
            $like = Like::firstOrCreate(
                ['user_id' => $request->user_id, 'post_id' => $request->post_id],
                ['user_id' => $request->user_id, 'post_id' => $request->post_id],
            );
            
            return Like::where('post_id', $request->post_id)->get()->count();
        } else {
            $like = Like::where('user_id', $request->user_id)->where('post_id', $request->post_id)->first();
            if($like) {
                $like->delete();
                return Like::where('post_id', $request->post_id)->get()->count();
            }
        } 
    }
}

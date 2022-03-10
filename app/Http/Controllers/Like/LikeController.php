<?php

namespace App\Http\Controllers\Like;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Traits\MessageTrait;

class LikeController extends Controller
{
    use MessageTrait;
    public function toggle(Request $request)
    {
        try {
            $like = Like::firstOrCreate(
                [
                    'user_id' => $request->user_id,
                    'post_id' => $request->post_id,
                ],
                [
                    'status' => true,
                    'user_id' => $request->user_id,
                    'post_id' => $request->post_id,
                ]
            );

            return $this->redirectBackWithMessage('success', 'Like');
        } catch (\Exception $e) {
            return $this->redirectBackWithMessage('error', 'Unhandeled problem');
        }
    }
}
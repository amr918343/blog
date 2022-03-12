<?php

namespace App\Http\Controllers\Like;

use App\BusinessLogic\Interfaces\ILikeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Traits\MessageTrait;
use App\BusinessLogic\LikeService;

class LikeController extends Controller
{
    use MessageTrait;
    private ILikeService $_likeService;
    public function __construct(ILikeService $likeService) {
        $this->_likeService = $likeService;
    }
    public function store(Request $request)
    {
        return $this->_likeService->toggleLike($request);
    }
}

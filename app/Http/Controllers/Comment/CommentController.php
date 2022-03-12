<?php

namespace App\Http\Controllers\Comment;

use App\BusinessLogic\Interfaces\ICommentService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    private ICommentService $_commentService;

    public function __construct(ICommentService $commentService) {
        $this->_commentService = $commentService;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, $id)
    {
        return $this->_commentService->add($request, $id);
    }
}

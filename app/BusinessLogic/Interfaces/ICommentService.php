<?php
namespace App\BusinessLogic\Interfaces;

use App\Http\Requests\CommentRequest;

interface ICommentService {
    public function add(CommentRequest $request, $id);
}
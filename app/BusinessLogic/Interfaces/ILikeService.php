<?php
namespace App\BusinessLogic\Interfaces;
use Illuminate\Http\Request;

interface ILikeService {
    public function toggleLike(Request $reqeust) : int;
}
<?php
namespace App\BusinessLogic\Interfaces;
use App\Http\Requests\PostRequest;

interface IPostService {
    public function getAll($page_counter);
    public function getOne($slug);
    public function add(PostRequest $request);
    public function getUserPosts($page_counter);
    public function update(PostRequest $request, $id);
    public function delete($id);
}
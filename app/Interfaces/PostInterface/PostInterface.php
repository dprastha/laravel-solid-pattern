<?php

namespace App\Interfaces\PostInterface;

use App\Http\Requests\PostRequest\StorePostRequest;
use App\Http\Requests\PostRequest\UpdatePostRequest;
use App\Models\Post;

interface PostInterface
{
    public function getPosts();

    public function createPost(StorePostRequest $request);

    public function getPostById(Post $post);

    public function updatePost(UpdatePostRequest $request, Post $post);

    public function deletePost(Post $post);
}

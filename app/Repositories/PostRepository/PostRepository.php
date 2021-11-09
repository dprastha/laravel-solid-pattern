<?php

namespace App\Repositories\PostRepository;

use App\Http\Requests\PostRequest\StorePostRequest;
use App\Http\Requests\PostRequest\UpdatePostRequest;
use App\Http\Resources\PostResource\PostResource;
use App\Interfaces\PostInterface\PostInterface;
use App\Models\Post;

class PostRepository implements PostInterface
{
    public function getPosts()
    {
        $posts = Post::with(['user', 'comments'])->get();

        return success(
            'Successfully get all post',
            PostResource::collection($posts)
        );
    }

    public function createPost(StorePostRequest $request)
    {
        $post = Post::create($request->validated());

        return success(
            'Successfully created ' . $request->title . ' Post',
            new PostResource($post)
        );
    }

    public function getPostById(Post $post)
    {
        return success(
            'Successfully get ' . $post->title,
            new PostResource($post->loadMissing(['user', 'comments']))
        );
    }

    public function updatePost(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return success(
            'Successfully updated ' . $post->title . ' post',
            new PostResource($post)
        );
    }

    public function deletePost(Post $post)
    {
        $post->delete();

        return success(
            'Successfully deleted ' . $post->title . ' post'
        );
    }
}

<?php

namespace App\Repositories\CommentRepository;

use App\Http\Requests\CommentRequest\StoreCommentRequest;
use App\Http\Requests\CommentRequest\UpdateCommentRequest;
use App\Http\Resources\CommentResource\CommentResource;
use App\Interfaces\CommentInterface\CommentInterface;
use App\Models\Comment;

class CommentRepository implements CommentInterface
{
    public function getComments()
    {
        $comments = Comment::with(['post', 'user', 'replies'])->get();

        return success(
            'Successfully get comments',
            CommentResource::collection($comments)
        );
    }

    public function createComment(StoreCommentRequest $request)
    {
        $comment = Comment::create($request->validated());

        return success(
            'Successfully created comment',
            new CommentResource($comment)
        );
    }

    public function getCommentById(Comment $comment)
    {
        return success(
            'Successfully get comment',
            new CommentResource($comment->loadMissing(['post', 'user', 'replies']))
        );
    }

    public function editComment(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());

        return success(
            'Successfully updated comment',
            new CommentResource($comment)
        );
    }

    public function deleteComment(Comment $comment)
    {
        $comment->delete();

        return success(
            'Successfully deleted comment',
            new CommentResource($comment)
        );
    }
}

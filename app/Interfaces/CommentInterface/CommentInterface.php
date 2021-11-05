<?php

namespace App\Interfaces\CommentInterface;

use App\Http\Requests\CommentRequest\StoreCommentRequest;
use App\Http\Requests\CommentRequest\UpdateCommentRequest;
use App\Models\Comment;

interface CommentInterface
{
    public function getComments();

    public function createComment(StoreCommentRequest $request);

    public function getCommentById(Comment $comment);

    public function editComment(UpdateCommentRequest $request, Comment $comment);

    public function deleteComment(Comment $comment);
}

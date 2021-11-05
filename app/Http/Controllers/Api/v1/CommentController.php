<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest\StoreCommentRequest;
use App\Http\Requests\CommentRequest\UpdateCommentRequest;
use App\Interfaces\CommentInterface\CommentInterface;
use App\Models\Comment;

class CommentController extends Controller
{
    protected $commentInterface;

    public function __construct(CommentInterface $commentInterface)
    {
        $this->commentInterface = $commentInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->commentInterface->getComments();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        return $this->commentInterface->createComment($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return $this->commentInterface->getCommentById($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        return $this->commentInterface->editComment($request, $comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        return $this->commentInterface->deleteComment($comment);
    }
}

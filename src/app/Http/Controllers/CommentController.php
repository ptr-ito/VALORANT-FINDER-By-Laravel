<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Resources\CommentResource;
use App\Http\Requests\CommentRequest;
use App\Services\Comment\CreateComment;
use App\Services\Comment\UpdateComment;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();

        return CommentResource::collection($comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = app(CreateComment::class)->execute([
            'user_id' => auth()->user()->id,
            'match_post_id' => $request->match_post_id,
            'root_id' => $request->input('root_id'),
            'content' => $request->input('content'),
        ]);

        return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $comments = app(UpdateComment::class)->execute([
            'user_id' => auth()->user()->id,
            'comment_id' => $comment->id,
            'match_post_id' => $request->match_post_id,
            'root_id' => $request->root_id,
            'content' => $request->input('content'),
        ]);

        return new CommentResource($comments);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment =Comment::find($id)->delete();

        return response()->json([
            $comment,
            'message' => 'コメントを削除しました',
        ], 200);
    }
}

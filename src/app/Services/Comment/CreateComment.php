<?php

namespace App\Services\Comment;

use App\Services\BaseService;
use App\Models\Comment;

class CreateComment extends BaseService
{
    public function rules()
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'match_post_id' => 'required|integer|exists:match_posts,id',
            'root_id' => 'nullable',
            'content' => 'required|string|min:1|max:255',
        ];
    }

    public function execute(array $data): Comment
    {

        $this->validate($data);

        $rootComment = Comment::find($data['root_id']);

        if($rootComment) {
            $reply = $rootComment->replies()->create($data);
            return Comment::find($reply->id);
        } else {
            $comment = Comment::create($data);
            return Comment::find($comment->id);
        }
    }
}

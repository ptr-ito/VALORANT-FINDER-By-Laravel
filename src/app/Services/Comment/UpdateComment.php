<?php

declare(strict_types=1);

namespace App\Services\Comment;

use App\Models\Comment;
use App\Services\BaseService;

class UpdateComment extends BaseService
{
    public function rules()
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'match_post_id' => 'required|integer|exists:match_posts,id',
            'comment_id' => 'required|integer|exists:comments,id',
            'root_id' => 'integer|nullable',
            'content' => 'required|string|min:1|max:255',
        ];
    }

    public function execute(array $data): Comment
    {
        $this->validate($data);

        if (! empty($data['match_post_id'])) {
            $comment = Comment::where('user_id', $data['user_id'])
                ->where('match_post_id', $data['match_post_id'])
                ->findOrFail($data['comment_id']);
        } else {
            $comment = Comment::where('user_id', $data['user_id'])
                ->findOrFail($data['comment_id']);
        }

        $comment->update([
            'content' => $data['content'],
        ]);

        $comment->fill($data)->save();

        return $comment;
    }
}

<?php

declare(strict_types=1);

namespace App\Services\MatchPost;

use App\Models\MatchPost;
use App\Services\BaseService;

class UpdateMatchPost extends BaseService
{
    public function rules()
    {
        return [
            'title' => 'required|string|min:1|max:255',
            'content' => 'required|min:1|string|max:2000',
            'mode_id' => 'required|integer',
            'mood_id' => 'required|integer',
        ];
    }

    public function execute(array $data): MatchPost
    {
        $this->validate($data);

        $matchPost = MatchPost::where('user_id', $data['user_id'])
            ->findOrFail($data['match_post_id']);

        $matchPost->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'mode_id' => $data['mode_id'],
            'mood_id' => $data['mood_id'],
        ]);

        $matchPost->fill($data)->save();

        return $matchPost;
    }
}

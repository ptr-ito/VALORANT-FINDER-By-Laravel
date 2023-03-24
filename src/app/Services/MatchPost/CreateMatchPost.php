<?php

declare(strict_types=1);

namespace App\Services\MatchPost;

use App\Models\MatchPost;
use App\Services\BaseService;

class CreateMatchPost extends BaseService
{
    public function rules()
    {
        return [
            'title' => 'required|string|min:1|max:255',
            'content' => 'required|min:1|string|max:2000',
            'mode_id' => 'required|integer',
            'mood_id' => 'required|integer',
            'ranks' => '',
        ];
    }

    public function execute(array $data): MatchPost
    {
        $this->validate($data);
        $matchPost = MatchPost::create($data);

        return MatchPost::find($matchPost->id);
    }
}

<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $created_at = new Carbon($this->created_at);
        $updated_at = new Carbon($this->updated_at);

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'match_post_id' => $this->match_post_id,
            'root_id' => $this->root_id,
            'content' => $this->content,
            'created_at' => $created_at->format('Y/m/d H:i'),
            'updated_at' => $updated_at->format('Y/m/d H:i'),
        ];
    }
}

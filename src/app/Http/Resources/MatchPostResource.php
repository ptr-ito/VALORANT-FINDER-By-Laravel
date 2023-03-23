<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MatchPostResource extends JsonResource
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
            'title' => $this->title,
            'content' => $this->content,
            'mode' => $this->mode->name,
            'mood' => $this->mood->name,
            'rank' => $this->ranks->map(function ($rank) {
                return $rank->name;
            }),
            'created_at' => $created_at->format('Y/m/d H:i'),
            'updated_at' => $updated_at->format('Y/m/d H:i'),
        ];
    }
}

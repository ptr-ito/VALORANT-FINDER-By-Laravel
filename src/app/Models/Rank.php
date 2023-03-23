<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    public function matchPosts()
    {
        return $this->belongsToMany(MatchPost::class);
    }
}

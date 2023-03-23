<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    public function matchPosts()
    {
        return $this->hasMany(MatchPost::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    public function match_posts()
    {
        return $this->hasMany(MatchPost::class);
    }
}

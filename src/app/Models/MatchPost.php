<?php

declare(strict_types=1);

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchPost extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mode()
    {
        return $this->belongsTo(Mode::class);
    }

    public function ranks()
    {
        return $this->belongsToMany(Rank::class, 'match_ranks');
    }

    public function mood()
    {
        return $this->belongsTo(Mood::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     // 保存時user_idをログインユーザーに設定
    //     self::saving(function ($post) {
    //         $post->user_id = Auth::id();
    //     });
    // }

    protected $fillable = [
        'title',
        'content',
        'mode_id',
        'mood_id',
        'user_id',
    ];
}

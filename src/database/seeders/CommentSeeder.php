<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private static $sequence = 1;
    public function run(): void
    {
        $rootCommentsCount = 10;
        $repliesCount = 5;

        Comment::factory()->count($rootCommentsCount)->create();

        for ($i = 0; $i < $repliesCount; $i++) {
            $parentComment = Comment::whereNull('root_id')->get()->random(1)[0];

            Comment::factory()->create([
                'content' => 'reply_' . self::$sequence++,
                'root_id' => $parentComment->id,
            ]);
        }
    }
}

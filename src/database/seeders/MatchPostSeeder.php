<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\MatchPost;
use App\Models\Rank;
use Illuminate\Database\Seeder;

class MatchPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rankIds = Rank::pluck('id')->random(rand(1, 4))->all();

        MatchPost::factory()
        ->count(20)
        ->create()
        ->each(function ($matchPost) use ($rankIds) {
            $matchPost->ranks()->sync($rankIds);
        });
    }
}

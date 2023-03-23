<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\MatchPost;
use App\Models\Rank;
use Illuminate\Database\Seeder;

class MatchPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $ranks = Rank::pluck('id')->all();
        // $rankIds = Rank::pluck('id')->random(rand(1, 4))->all();
        // $ranks = implode(',', $rankIds);

        // MatchPost::Factory()
        //     ->count(5)
        //     ->for(UserSeeder::$user)
        //     ->create()
        //     ->ranks()
        //     ->sync(explode(",", $ranks));
    }
}

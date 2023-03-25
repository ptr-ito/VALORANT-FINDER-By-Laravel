<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use App\Models\MatchPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();
    }
}

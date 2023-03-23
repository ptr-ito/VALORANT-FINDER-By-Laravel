<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public static User $user;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::$user = User::factory()->create();
    }
}

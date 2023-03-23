<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('modes')->insert([
            ['name' => 'コンペティティブ'],
            ['name' => 'アンレート'],
            ['name' => 'カスタム'],
            ['name' => 'その他'],
        ]);
    }
}

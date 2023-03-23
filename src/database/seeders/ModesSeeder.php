<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ModesSeeder extends Seeder
{
    /**
     * 
     */
    public function run(): void
    {
        DB::table('modes')->insert([
            ['name' => 'コンペティティブ'],
            ['name' => 'アンレート'],
            ['name' => 'カスタム'],
            ['name' => 'その他']
        ]);
    }
}

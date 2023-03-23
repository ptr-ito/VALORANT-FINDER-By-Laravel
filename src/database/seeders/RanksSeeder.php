<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ranks')->insert([
            ['name' => '未選択'],
            ['name' => 'ランクなし'],
            ['name' => 'アイアン1'],
            ['name' => 'アイアン2'],
            ['name' => 'アイアン3'],
            ['name' => 'ブロンズ1'],
            ['name' => 'ブロンズ2'],
            ['name' => 'ブロンズ3'],
            ['name' => 'シルバー1'],
            ['name' => 'シルバー2'],
            ['name' => 'シルバー3'],
            ['name' => 'ゴールド1'],
            ['name' => 'ゴールド2'],
            ['name' => 'ゴールド3'],
            ['name' => 'プラチナ1'],
            ['name' => 'プラチナ2'],
            ['name' => 'プラチナ3'],
            ['name' => 'ダイヤモンド1'],
            ['name' => 'ダイヤモンド2'],
            ['name' => 'ダイヤモンド3'],
            ['name' => 'アセンダント1'],
            ['name' => 'アセンダント2'],
            ['name' => 'アセンダント3'],
            ['name' => 'イモータル1'],
            ['name' => 'イモータル2'],
            ['name' => 'イモータル3'],
            ['name' => 'レディアント'],
        ]);
    }
}

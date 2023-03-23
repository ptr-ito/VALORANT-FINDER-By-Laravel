<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('moods')->insert([
            ['name' => 'わいわいやりたい'],
            ['name' => '勝ち負けにこだわらない'],
            ['name' => 'わいわいしながら連携は取りたい'],
            ['name' => '勝ちにいきたい']
        ]);
    }
}

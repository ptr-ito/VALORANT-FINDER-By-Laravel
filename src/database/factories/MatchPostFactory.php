<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Mode;
use App\Models\Mood;
use App\Models\Rank;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MatchPost>
 */
class MatchPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $sequence = 1;

    public function definition(): array
    {
        $modes = Mode::pluck('id')->all();
        $moods = Mood::pluck('id')->all();
        $ranks = Rank::pluck('id')->all();
        $users = User::pluck('id')->all();
        $randNum = $this->faker->numberBetween(1, 4);

        $date = $this->faker->dateTimeBetween('-1year');

        return [
            'user_id' => $this->faker->randomElement($users),
            'title' => 'title_'.self::$sequence++,
            'content' => 'content_'.self::$sequence++,
            // 'mode_id' => $this->faker->randomElement($modes),
            // 'mood_id' => $this->faker->randomElement($moods),
            // 'ranks' => $this->faker->randomElements($ranks, $randNum),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Mode;
use App\Models\Mood;
use App\Models\Rank;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $randNum = $this->faker->numberBetween(1, 4);
        $ranks = $this->faker->randomElements($ranks, $randNum);

        $date = $this->faker->dateTimeBetween('-1year');

        return [
            'title' => 'title_'.self::$sequence++,
            'content' => 'content_'.self::$sequence++,
            'mode_id' => $this->faker->randomElement($modes),
            'mood_id' => $this->faker->randomElement($moods),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}

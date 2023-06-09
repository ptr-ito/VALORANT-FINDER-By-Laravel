<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Mode;
use App\Models\Mood;
use App\Models\User;
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
        $user_id = User::all()->random(1)[0]->id;

        $createdAt = $this->faker->dateTimeBetween('-1 years');
        $updatedAt = $this->faker->dateTimeBetween($createdAt);

        return [
            'title' => 'title_'.self::$sequence++,
            'content' => 'content_'.self::$sequence++,
            'mode_id' => $this->faker->randomElement($modes),
            'mood_id' => $this->faker->randomElement($moods),
            'user_id' => $user_id,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];
    }
}

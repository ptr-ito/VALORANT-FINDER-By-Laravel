<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\MatchPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $sequence = 1;

    public function definition(): array
    {
        $user_id = User::all()->random(1)[0]->id;
        $match_post_id = MatchPost::all()->random(1)[0]->id;

        $createdAt = $this->faker->dateTimeBetween('-1 years');
        $updatedAt = $this->faker->dateTimeBetween($createdAt);

        return [
            'content' => 'comment_'.self::$sequence++,
            'user_id' => $user_id,
            'root_id' => null,
            'match_post_id' => $match_post_id,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];
    }
}

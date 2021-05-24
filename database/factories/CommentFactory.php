<?php

namespace Database\Factories;

use App\Content;
use App\Comment;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();
        $content = Content::factory()->create();
        $date = $this->faker->dateTimeThisMonth();
        return [
            "user_id" => $user,
            "content_id" => $content,
            "body" => $this->faker->paragraph(),
            "created_at" => $date,
            "updated_at" => $date,
        ];
    }
}

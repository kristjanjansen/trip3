<?php

namespace Database\Factories;

use App\Models\Content;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Content::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();
        $date = $this->faker->dateTimeThisMonth();
        $type = $this->faker->randomElement([
            "general",
            "buysell",
            "expats",
            "misc",
        ]);
        return [
            "title" => $this->faker->sentence(),
            "user_id" => $user,
            "body" => $this->faker->paragraphs(2, true),
            "type" => $type,
            "created_at" => $date,
            "updated_at" => $date,
        ];
    }
}

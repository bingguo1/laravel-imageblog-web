<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\BlogPost;
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'body' => $this->faker->sentence(),
            'user_id' => User::all()->random()->id,
            'post_id' => BlogPost::all()->random()->id,
        ];
    }
}

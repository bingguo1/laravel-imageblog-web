<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(), //Generates a fake sentence
            'body' => $this->faker->paragraph(30), //generates fake 30 paragraphs
            //            'user_id' => User::factory(), //Generates a User from factory and extracts id
            'user_id' => User::all()->random()->id, // this won't create new User
            /// the following two ways all work
            // public static function image($dir = null, $width = 640, $height = 480, $category = null, $fullPath = true, $randomize = true, $word = null)
            'image' => 'imgs/'.$this->faker->image('public/storage/imgs',640,480,null,false)
            //            'image' => $this->faker->imageUrl('270', '200'),

            //
        ];
    }
}

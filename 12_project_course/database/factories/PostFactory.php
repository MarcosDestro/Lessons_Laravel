<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->paragraph(1);
        return [
            'uri' => Str::slug($title),
            'title' => $title,
            'subtitle' => $this->faker->paragraph(1),
            'content' => $this->faker->paragraph(50),
            'author' => 1,
            'cover' => 'posts/'.$this->faker->unique()->numberBetween(1,12).'.jpg'
        ];
    }
}

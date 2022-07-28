<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Category;

class PostCategoryFactory extends Factory
{
    //Classe modelo
    protected $model = PostCategory::class;

    public function definition()
    {
        return [
            'post' => $this->faker->randomElement(Post::all()->pluck('id')->toArray()),
            'category' => $this->faker->randomElement(Category::all()->pluck('id')->toArray())
        ];
    }
}

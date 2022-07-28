<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{

    //Classe modelo
    protected $model = Category::class;

    public function definition()
    {
        $category = $this->faker->words(3, true);

        return [
            'name' => $category,
            'slug' => Str::slug($category)
        ];
    }
}
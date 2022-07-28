<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\User;

class PostFactory extends Factory
{

    //Classe modelo
    protected $model = Post::class;

    public function definition()
    {
        //Infos do faker
        $title = $this->faker->paragraph(1);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'subtitle' => $this->faker->paragraph(1),
            'description' => $this->faker->paragraph(5),
            'author' => $this->faker->randomElement(User::all()->pluck('id')->toArray())
        ];
    }
}
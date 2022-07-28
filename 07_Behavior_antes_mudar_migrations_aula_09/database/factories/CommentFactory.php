<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;
use App\Models\User;

class CommentFactory extends Factory
{
    //Classe modelo
    protected $model = Comment::class;


    public function definition()
    {
        return [
            'post' => $this->faker->randomElement(User::all()->pluck('id')->toArray()),
            'user' => $this->faker->randomElement(User::all()->pluck('id')->toArray()),
            'content' => $this->faker->paragraph('1')
        ];
    }
}
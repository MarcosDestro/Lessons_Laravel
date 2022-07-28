<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition()
    {
        return [
        'user' => $this->faker->randomElement(\App\Models\User::all()->pluck('id')->toArray()),
        'address' => $this->faker->streetAddress(),
        'number' => $this->faker->randomNumber(4),
        'complement' => $this->faker->streetName(),
        'zipcode' => $this->faker->postcode(),
        'city' => $this->faker->city(),
        'state' => $this->faker->city(),
        'status' => rand(0, 1),
        ];
    }
}

<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::resource('users', UserController::class);
Route::resource('addresses', AddressController::class);
Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);

Route::get('/', function () {
    // $faker = Faker\Factory::create();

    // // generate data by accessing properties
    // echo $faker->randomElement(\App\Models\User::all()->pluck('id')->toArray());
    // ;
    
    // var_dump(DB::table('users')->inRandomOrder()->first());
    // var_dump(\App\Models\User::all()->pluck('id')->toArray());

    return view('welcome');
});

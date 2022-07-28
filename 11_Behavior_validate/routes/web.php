<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('template.form');
})->name('course.create');

Route::post('/submit', [CourseController::class, 'store'])->name('course.store');

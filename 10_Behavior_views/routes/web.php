<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    $user = new stdClass();
    $user->name = "Marcos Destro";
    $user->birth = "1986-08-09";
    $user->email = "teste@teste.com";

    $courses = [
        [
            'id' => 1,
            'name' => 'Laravel Developer',
            'tutor' => "Gustavo Web"
        ],
        [
            'id' => 2,
            'name' => 'Boostrap Builder',
            'tutor' => "Gustavo Web"
        ],
        [
            'id' => 3,
            'name' => 'FullStack PHP Developer',
            'tutor' => "Robson V. Leite"
        ]
    ];

    return view('front.home', [
        'user' => $user,
        'courses' => $courses
    ]);

    // return view('front.home')->with(['user' => $user]);
    // return view('front.home')->with('user', $user);

    // return view('front.home', compact('user'));

});

Route::get('/curso', function(){
    return view('front.course');
});

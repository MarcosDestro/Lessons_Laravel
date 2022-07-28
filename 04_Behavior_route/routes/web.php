<?php

use Illuminate\Support\Facades\Route;
use LaraDev\Http\Controllers\PostController;
use LaraDev\Http\Controllers\Admin\UserController;

Route::resourceVerbs([
    'create' => 'cadastro',
    'edit' => 'editar'
]);

Route::get('/', function () {
    return view('welcome');
});

// Route::view('/form', 'form');
// /** GET */
// Route::get('/user/1', [UserController::class, 'index']);
// Route::get('/getData', [UserController::class, 'getData']);

// /** POST */
// Route::post('/postData', [UserController::class, 'postData']);

// /** PUT */
// Route::put('/user/1', [UserController::class, 'testPut']);

// /** PATCH */
// Route::patch('/user/1', [UserController::class, 'testPatch']);

// /** Match de PUT e PATCH */
// Route::match(['put', 'patch'],'/user/2', [UserController::class, 'testMatch']);

// /** DELETE */
// Route::delete('/user/1', [UserController::class, 'destroy']);

// /** ANY */
// Route::any('/users', [UserController::class, 'any']);

/** Resource */
// Route::get('/posts/premium', [PostController::class, 'premium']);

//Cuidado, não passar array
//Route::resource('posts', PostController::class);
//Route::resource('posts', PostController::class)->only(['index', 'show']);
//Route::resource('posts', PostController::class)->except(['destroy']);

Route::fallback(function(){
    echo "Página 404!";
});

// Route::redirect('/form/add', url('/form'), 301);

// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/index', [PostController::class, 'indexRedirect'])->name('posts.indexRedirect');

// // Parâmetros via uri
// Route::get('/users/{id}/comments/{comments}', function($id, $comment){
//     var_dump($id, $comment);
// });

// Route::get('/users/{id}/comments/{comment?}', function($id, $comment=null){
//     var_dump($id, $comment);
// })->where(['id'=>'[0-9]+', 'comment'=>'[a-z]+']);

// Route::get('/users/{id}/comments/{comment?}', [UserController::class, 'userComments'])->where(['id'=>'[0-9]+', 'comment'=>'[0-9a-z]+']);

// Route::get('/users/1', [UserController::class, 'inspect'])->name('inspect');

// //Agrupa por prefixo
// Route::prefix('/admin')->group(function(){
//     Route::view('/form', 'form');
// });

// //Agrupa por nome
// Route::name('admin.posts.')->group(function(){
//     Route::get('/admin/posts/index', [PostController::class, 'index'])->name('index');
//     Route::get('/admin/posts', [PostController::class, 'show'])->name('show');
// });

// //Aceita 10 requisições dentro de um minuto
// Route::middleware(['throttle:10,1'])->group(function(){
//     Route::view('/form', 'form');
// });

// Route::namespace('Admin')->group(function(){
//     Route::get('/users', [UserController::class, 'index']);
// });

//Cria todas as rotas agrupadas por namespace, prefix, middleware e name:
Route::group(['namespaece' => 'Admin', 'prefix' => 'admin', 'middleware' => 'throttle:10,1', 'as' => 'admin.'], function(){
    Route::resource('users', UserController::class);
});
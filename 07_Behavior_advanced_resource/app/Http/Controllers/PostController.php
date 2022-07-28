<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        echo "<p>#{$post->id} Título: {$post->title}</p>";
        echo "<p>Subtítulo: {$post->subtitle}</p>";
        echo "<p>Conteúdo: {$post->description}</p>";
        echo "<p>Data de Criação: {$post->createdFmt}</p><hr>";

        // $post->title = "Título de teste do meu artigo!";
        // $post->save();

        $postAuthor = $post->author()->get()->first();
        if($postAuthor){
            echo "<h2>Dados do Autor</h2>";
            echo "<p>Nome do usuário: {$postAuthor->name}</p>";
            echo "<p>E-mail {$postAuthor->email}</p></br>";
        }

        $categories = $post->categories()->get();
        if($categories){
            echo "<h2>Categorias</h2>";

            foreach($categories as $category){
                echo "<p>Categoria: #{$category->id} {$category->name}</p>";
            }
        }

        // $post->categories()->attach([7]);
        // $post->categories()->detach([3]);

        // $post->categories()->sync([5,10]);
        // $post->categories()->syncWithoutDetaching([7,8,9]);

        // $post->comments()->create([
        //     'content' => 'Teste 123'
        // ]);
       
        $comments = $post->comments()->get();

        if($comments){
            echo "<h2>Comentários</h2>";

            foreach($comments as $comment){
                echo "<p>Comentário: #{$comment->id} {$comment->content}</p>";
            }
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

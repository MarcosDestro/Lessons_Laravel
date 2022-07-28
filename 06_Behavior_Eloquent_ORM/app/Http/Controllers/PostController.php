<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** Traz um coletivo de dados em forma de array */
        // $posts = Post::where('created_at', '>=', date('Y/m/d H:i:s'))->orderBy('title', 'asc')->get();
        // foreach($posts as $post){
        //     echo "<h1>{$post->title}</h1>";
        //     echo "<h2>{$post->subtitle}</h2>";
        //     echo "<p>{$post->description}</p>";
        //     echo "<hr>";
        // }

        /** Traz somente o primeiro item da consulta */
        //$posts = Post::where('created_at', '>=', date('Y/m/d H:i:s'))->first();

        /** Traz o primeiro item que atenda a condição ou devolve um 404 */
        //$posts = Post::where('created_at', '>=', date('Y/m/d H:i:s'))->firstOrFail();

        /** Find tras o item pelo id da tabela */
        //$posts = Post::find(2);

        /** Tras pelo id, ou devolve uma 404 */
        // $posts = Post::findOrFail(99);

        /** Verifica se a pesquisa teve resultados, sendo true or false */
        // $posts = Post::where('created_at', '>=', date('Y/m/d H:i:s'))->exists();

        /** Devolve a quantia de registros encontrados */
        // $posts = Post::where('created_at', '>=', date('Y/m/d H:i:s'))->count();

        /** Tras todos os registros da tabela */
        $posts = Post::all();

        // Retorna todos os registros incluindo os da lixeira:
        //$posts = Post::withTrashed()->get();

        // foreach($posts as $post){
        //     echo "<h1>{$post->title}</h1>";
        //     echo "<h2>{$post->subtitle}</h2>";
        //     echo "<p>{$post->description}</p>";
        //     echo "<hr>";
        // }

        return view('posts.index', ['posts' => $posts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Object->Prop->Save
        $post = new Post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->description = $request->description;
        $post->save();

        //Mass Assignment
        // Post::create([
        //     'title' => $request->title,
        //     'subtitle' => $request->subtitle,
        //     'description' => $request->description
        // ]);

        // First Or New
        // $post = Post::firstOrNew([
        //     'title' => 'Teste2'
        // ],[
        //     'subtitle' => 'Teste2',
        //     'description' => 'Teste2'
        // ]);
        // $post->save();

        //First Or Create
        // $post = Post::firstOrCreate([
        //     'title' => 'Teste2',
        //     'subtitle' => 'Teste3'
        // ],[
        //     'description' => 'Teste2'
        // ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Essa opção também é válida
        $post = Post::find($post->id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->description = $request->description;
        $post->save();

        // Atualiza ou cria um novo
        // $post = Post::updateOrCreate([
        //     'title' => $request->title
        // ],[
        //     'subtitle' => $request->subtitle,
        //     'description' => $request->description
        // ]);

        // Atualização em massa
        // $post = Post::find($post->id);
        // $post->update([
        //     'title' => $request->title,
        //     'subtitle' => $request->subtitle,
        //     'description' =>$request->description
        // ]);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Post::find($post->id)->delete();
        // Post::destroy([3]);
        Post::destroy($post->id);
        // Post::where('created_at', '>=', date('Y/m/d H:i:s'))->delete();
        return redirect()->route('posts.index');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.trashed', ['posts' =>$posts]); 
    }

    public function restore($post)
    {
        $post = Post::onlyTrashed()->where(['id' => $post])->first();

        //Se realmente estiver na lixeira...
        if($post->trashed()){
            //Restaure o registro:
            $post->restore();
        }
        return redirect()->route('posts.trashed');
    }

    public function forceDelete($post)
    {
        Post::onlyTrashed()->where(['id' => $post])->forceDelete();
        return redirect()->route('posts.trashed');
    }
}

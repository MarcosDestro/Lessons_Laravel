<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $user = User::find($id);
        echo "<h2>Dados do Usuário</h2>";
        echo "<p>Nome do usuário: {$user->name}</p>";
        echo "<p>E-mail {$user->email}</p></br>";

        $userAddress = $user->addressDelivery()->get()->first();
        if($userAddress){
            echo "<h2>Endereço de Enterega</h2>";
            echo "<p>Endereço: {$userAddress->address}, {$userAddress->number}</p>";
            echo "<p>Complemento: {$userAddress->complement} CEP:{$userAddress->zipcode}</p>";
            echo "<p>Cidade/Estado: {$userAddress->city} / {$userAddress->state}</p>";
        }

        //Salvando como array direto
        // $addressTest = new Address([
        //     'address' => 'Rua dos bobos', 
        //     'number' => '0', 
        //     'complement' => 'Apto 123', 
        //     'zipcode' => '88000-000', 
        //     'city' => 'Floripa', 
        //     'state' => 'SC'
        // ]);

        /** Salvando por ataque ao objeto */
        // $address = new Address();
        // $address->address = 'Rua dos bobos 1';
        // $address->number = '123';
        // $address->complement = 'Bloco 2';
        // $address->zipcode = '87000-000';
        // $address->city = 'Florianópolis';
        // $address->state = 'Santa Catarina';

        /** Salvar somente um objeto */
        // $user->addressDelivery()->save($address);
        /** Salvar vários objetos */
        // $user->addressDelivery()->saveMany([$address, $addressTest]);

        /** Savar direto pelo create */
        // $user->addressDelivery()->create([
        //     'address' => 'Rua dos bobos', 
        //     'number' => '0', 
        //     'complement' => 'Apto 123', 
        //     'zipcode' => '88000-000', 
        //     'city' => 'Floripa', 
        //     'state' => 'SC'
        // ]);

        /** Savar vários arrays */
        // $user->addressDelivery()->create([
        //     [
        //     'address' => 'Rua dos bobos', 
        //     'number' => '0', 
        //     'complement' => 'Apto 123', 
        //     'zipcode' => '88000-000', 
        //     'city' => 'Floripa', 
        //     'state' => 'SC'
        //     ],[
        //     'address' => 'Rua dos bobos', 
        //     'number' => '0', 
        //     'complement' => 'Apto 123', 
        //     'zipcode' => '88000-000', 
        //     'city' => 'Floripa', 
        //     'state' => 'SC'        
        //     ]
        //     ]);

        // $users = User::with('addressDelivery')->get();
        // dd($users);

        // Pegar os posts do usuário instanciado acima
        $posts = $user->posts()->orderBy('id','DESC')->get();
        // $posts = $user->posts()->orderBy('id','DESC')->take(2)->get();
        if($posts){
            echo "<h2>Artigos</h2>";

            foreach($posts as $post){
                echo "<p>#{$post->id} Título: {$post->title}</p>";
                echo "<p>Subtítulo: {$post->subtitle}</p>";
                echo "<p>Conteúdo: {$post->description}</p><hr>";
            }
        }

        // Listar todos os comentários de todos os posts
        $comments = $user->commentsOnMyPost()->get();

        if($comments){
            echo "<h2>Comentários</h2>";

            foreach($comments as $comment){
                echo "<p>Artigo #{$comment->post}, Usuário #{$comment->user}</br>";
                echo "Comentário: {$comment->content}</p><hr>";
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

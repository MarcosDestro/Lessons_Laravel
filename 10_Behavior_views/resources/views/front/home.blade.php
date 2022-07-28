@extends('front.master.master')

@section('title', 'Seja muito bem vindo!')

@section('content')

<div class="container">
    <div class="row py-4">
        <div class="col-12 newteste">
            {{-- Teste --}}
            Meu nome é: {{ $user->name }}
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <?php
            echo "<h2>Sintaxe do PHP</h2>";
            if (!empty($user->email)) {
                echo "<p>[IF] O Usuário informou um email!</p>";
            } elseif ($user) {
                echo "<p>[ELSEIF] O objeto usuário existe!</p>";
            } else {
                echo "<p>[ELSE] Não existe o objeto usuário!</p>";
            }
            
            echo "<p>[TERNÁRIA] ". (!empty($user->email) ? 'O Usuário informou um email!': 'O objeto usuário existe!') ."</p>";
            echo "<p>[TERNÁRIA DUPLA] ". (!empty($user->email) ? 'O Usuário informou um email!': ($user ? 'O objeto usuário existe!' : 'Não existe o objeto usuário!')) ."</p>";
            
            if(isset($user)){
                echo "<p>[ISSET] Existe um usuário</p>";
            }
            
            if(empty($user)){
                echo "<p>[EMPTY] Não existe um usuário</p>";
            }
            
            $var = '5';
            switch ($var) {
                case '1':
                    echo "<p>[CASE] 1</p>";
                    break;
                case '2':
                    echo "<p>[CASE] 2</p>";
                    break;
                default:
                    echo "<p>[CASE] Default</p>";
                    break;
            }
            
            echo '<h2>Listagem dos Cursos</h2>';
            
            for ($i=0; $i < count($courses); $i++) { 
                echo "<p>". $courses[$i]['name'] ." - ". $courses[$i]['tutor']  ."</p>";
            }
            
            foreach ($courses as $course) {
                echo "<p>". $course['name'] ." - ". $course['tutor']  ."</p>";
            }
            
            ?>
        </div>
        <div class="col-6">
            <h2>Sintaxe do Blade</h2>
            @if (!empty($user->email))
                <p>[IF] O Usuário informou um email!</p>
            @elseif ($user)
                <p>[ELSEIF] O objeto usuário existe!</p>
            @else
                <p>[ELSE] Não existe o objeto usuário!</p>
            @endif

            <p>[TERNÁRIA] {{ (!empty($user->email) ? 'O Usuário informou um email!': 'O objeto usuário existe!') }}</p>
            <p>[TERNÁRIA DUPLA] {{ (!empty($user->email) ? 'O Usuário informou um email!': ($user ? 'O objeto usuário existe!' : 'Não existe o objeto usuário!')) }}</p>

            @isset($user)
                <p>[ISSET] Existe um usuário</p>
            @endisset

            @empty($user)
                <p>O usuário não existe</p>
            @endempty

            @switch($var)
                @case('1')
                    <p>[CASE] 1</p>
                    @break
                @case('2')
                    <p>[CASE] 2</p>
                    @break
                @default
                    <p>[CASE] Default</p>
                    @break
            @endswitch

            <h2>Listagem dos Cursos</h2>

            @for ($i = 0; $i < count($courses); $i++)
                <p> {{ $courses[$i]['name'] }} - {{ $courses[$i]['tutor'] }}</p>
            @endfor

            @foreach ($courses as $course)
                <p style="background-color: {{ ($loop->index % 2 === 0 ? 'red' : 'blue' ) }}">{{ $course['name'] }} - {{ $course['tutor']  }}</p>
                {{-- {{ var_dump($loop) }} --}}
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @component('front.components.alert', ['type' => 'danger', 'datetime'=> date('d/m/Y H:i:s')])
                Mensagem de Teste
            @endcomponent
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <x-alert type="success" datetime="{{ date('d/m/Y H:i:s') }}">
                Essa mensagem foi gerada pelo componente do provider
            </x-alert>
        </div>
    </div>
</div>

@endsection
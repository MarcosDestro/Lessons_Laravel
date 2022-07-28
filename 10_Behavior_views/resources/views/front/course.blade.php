@extends('front.master.master-with-sidebar')

@section('title', 'O melhor curso do Brasil')

@section('js')
    <script>alert('Olá')</script>
@endsection

@section('css')
    <style>
        .teste{
            color: purple;
        }
    </style>
@endsection

@section('sidebar')
    @parent
    <h2 class="teste">Listagem dos artigos</h2>
    <ul>
        <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt, dolores.</li>
        <li>Corporis deleniti soluta perspiciatis nostrum quaerat sequi explicabo porro aut!</li>
        <li>Quibusdam ipsa exercitationem fugit alias, quae quia quos veritatis explicabo!</li>
    </ul>
@endsection

@section('content')
    <h1>Conteúdo</h1>
@endsection
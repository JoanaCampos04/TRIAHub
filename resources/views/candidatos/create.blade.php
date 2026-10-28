@extends('layouts.app')

@section('titulo', 'Novo candidato | TRIAHub')

@section('conteudo')
    <h1>Novo candidato</h1>
    <div class="card">
        <form action="{{ route('candidatos.store') }}" method="POST">
            @csrf
            @include('candidatos._form', ['botao' => 'Cadastrar'])
        </form>
    </div>
@endsection
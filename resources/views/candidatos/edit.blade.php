@extends('layouts.app')

@section('titulo', 'Editar candidato | TRIAHub')

@section('conteudo')
    <h1>Editar candidato</h1>
    <div class="card">
        <form action="{{ route('candidatos.update', $candidato) }}" method="POST">
            @csrf
            @method('PUT')
            @include('candidatos._form', ['botao' => 'Atualizar'])
        </form>
    </div>
@endsection
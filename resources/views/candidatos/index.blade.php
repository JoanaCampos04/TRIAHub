@extends('layouts.app')

@section('titulo', 'Candidatos | TRIAHub')

@section('conteudo')
    <div class="topo">
        <h1>Candidatos</h1>
        <a class="btn" href="{{ route('candidatos.create') }}">Novo candidato</a>
    </div>

    @if($candidatos->isEmpty())
        <div class="vazio">Nenhum candidato cadastrado ainda.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Cargo desejado</th>
                    <th>Cidade</th>
                    <th>Nível</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidatos as $candidato)
                    <tr>
                        <td>
                            {{ $candidato->nome }}<br>
                            <small>{{ $candidato->email }}</small>
                        </td>
                        <td>{{ $candidato->cargo_desejado }}</td>
                        <td>{{ $candidato->cidade }}</td>
                        <td>{{ \App\Models\Candidato::NIVEIS[$candidato->nivel] ?? $candidato->nivel }}</td>
                        <td>
                            <span class="badge badge-{{ $candidato->status }}">
                                {{ \App\Models\Candidato::STATUS[$candidato->status] ?? $candidato->status }}
                            </span>
                        </td>
                        <td class="acoes">
                            <a class="btn btn-cinza" href="{{ route('candidatos.edit', $candidato) }}">Editar</a>
                            <form action="{{ route('candidatos.destroy', $candidato) }}" method="POST"
                                  onsubmit="return confirm('Excluir este candidato?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-vermelho">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
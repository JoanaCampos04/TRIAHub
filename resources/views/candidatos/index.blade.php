@extends('layouts.app')

@section('titulo', 'Candidatos | TRIAHub')

@section('conteudo')
    <div class="topo">
        <h1>Candidatos</h1>
        <a class="btn" href="{{ route('candidatos.create') }}">Novo candidato</a>
    </div>
<form method="GET" action="{{ route('candidatos.index') }}" class="card filtros">
    <div>
        <label for="busca">Nome ou e-mail</label>
        <input type="text" id="busca" name="busca" value="{{ request('busca') }}">
    </div>
    <div>
        <label for="cargo">Cargo</label>
        <input type="text" id="cargo" name="cargo" value="{{ request('cargo') }}">
    </div>
    <div>
        <label for="cidade">Cidade</label>
        <input type="text" id="cidade" name="cidade" value="{{ request('cidade') }}">
    </div>
    <div>
        <label for="nivel">Nível</label>
        <select id="nivel" name="nivel">
            <option value="">Todos</option>
            @foreach(\App\Models\Candidato::NIVEIS as $valor => $rotulo)
                <option value="{{ $valor }}" @selected(request('nivel') === $valor)>{{ $rotulo }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="status">Status</label>
        <select id="status" name="status">
            <option value="">Todos</option>
            @foreach(\App\Models\Candidato::STATUS as $valor => $rotulo)
                <option value="{{ $valor }}" @selected(request('status') === $valor)>{{ $rotulo }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <button type="submit" class="btn">Filtrar</button>
        <a class="btn btn-cinza" href="{{ route('candidatos.index') }}">Limpar</a>
    </div>
</form>

<p>{{ $candidatos->count() }} candidato(s) encontrado(s).</p>
    @if($candidatos->isEmpty())
        <div class="vazio">Nenhum candidato encontrado.</div>
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
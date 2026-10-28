<label for="nome">Nome</label>
<input type="text" id="nome" name="nome" value="{{ old('nome', $candidato->nome ?? '') }}">
@error('nome') <span class="erro">{{ $message }}</span> @enderror

<label for="email">E-mail</label>
<input type="email" id="email" name="email" value="{{ old('email', $candidato->email ?? '') }}">
@error('email') <span class="erro">{{ $message }}</span> @enderror

<label for="cargo_desejado">Cargo desejado</label>
<input type="text" id="cargo_desejado" name="cargo_desejado" value="{{ old('cargo_desejado', $candidato->cargo_desejado ?? '') }}">
@error('cargo_desejado') <span class="erro">{{ $message }}</span> @enderror

<label for="cidade">Cidade</label>
<input type="text" id="cidade" name="cidade" value="{{ old('cidade', $candidato->cidade ?? '') }}">
@error('cidade') <span class="erro">{{ $message }}</span> @enderror

<label for="nivel">Nível</label>
<select id="nivel" name="nivel">
    <option value="">Selecione...</option>
    @foreach(\App\Models\Candidato::NIVEIS as $valor => $rotulo)
        <option value="{{ $valor }}" @selected(old('nivel', $candidato->nivel ?? '') === $valor)>{{ $rotulo }}</option>
    @endforeach
</select>
@error('nivel') <span class="erro">{{ $message }}</span> @enderror

@isset($candidato)
    <label for="status">Status</label>
    <select id="status" name="status">
        @foreach(\App\Models\Candidato::STATUS as $valor => $rotulo)
            <option value="{{ $valor }}" @selected(old('status', $candidato->status) === $valor)>{{ $rotulo }}</option>
        @endforeach
    </select>
    @error('status') <span class="erro">{{ $message }}</span> @enderror
@endisset

<label for="resumo">Resumo</label>
<textarea id="resumo" name="resumo" rows="4">{{ old('resumo', $candidato->resumo ?? '') }}</textarea>
@error('resumo') <span class="erro">{{ $message }}</span> @enderror

<p style="margin-top:16px">
    <button type="submit" class="btn">{{ $botao }}</button>
    <a class="btn btn-cinza" href="{{ route('candidatos.index') }}">Cancelar</a>
</p>
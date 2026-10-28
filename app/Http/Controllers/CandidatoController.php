<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CandidatoController extends Controller
{
    public function index(Request $request)
{
    $candidatos = Candidato::query()
        ->when($request->filled('busca'), function ($query) use ($request) {
            $termo = '%' . $request->busca . '%';
            $query->where(function ($q) use ($termo) {
                $q->where('nome', 'like', $termo)
                  ->orWhere('email', 'like', $termo);
            });
        })
        ->when($request->filled('cargo'), fn ($q) => $q->where('cargo_desejado', 'like', '%' . $request->cargo . '%'))
        ->when($request->filled('cidade'), fn ($q) => $q->where('cidade', 'like', '%' . $request->cidade . '%'))
        ->when($request->filled('nivel'), fn ($q) => $q->where('nivel', $request->nivel))
        ->when($request->filled('status'), fn ($q) => $q->where('status', $request->status))
        ->latest()
        ->get();

    return view('candidatos.index', compact('candidatos'));
} 

    public function create()
    {
        return view('candidatos.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:candidatos,email',
            'cargo_desejado' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'nivel' => ['required', Rule::in(array_keys(Candidato::NIVEIS))],
            'resumo' => 'nullable|string',
        ]);

        Candidato::create($dados);

        return redirect()->route('candidatos.index')
            ->with('sucesso', 'Candidato cadastrado com sucesso!');
    }

    public function edit(Candidato $candidato)
    {
        return view('candidatos.edit', compact('candidato'));
    }

    public function update(Request $request, Candidato $candidato)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('candidatos', 'email')->ignore($candidato->id)],
            'cargo_desejado' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'nivel' => ['required', Rule::in(array_keys(Candidato::NIVEIS))],
            'resumo' => 'nullable|string',
            'status' => ['required', Rule::in(array_keys(Candidato::STATUS))],
        ]);

        $candidato->update($dados);

        return redirect()->route('candidatos.index')
            ->with('sucesso', 'Candidato atualizado com sucesso!');
    }

    public function destroy(Candidato $candidato)
    {
        $candidato->delete();

        return redirect()->route('candidatos.index')
            ->with('sucesso', 'Candidato excluído.');
    }
}
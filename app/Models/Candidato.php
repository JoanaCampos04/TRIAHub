<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    public const NIVEIS = [
        'estagio' => 'Estágio',
        'junior' => 'Júnior',
        'pleno' => 'Pleno',
        'senior' => 'Sênior',
    ];

    public const STATUS = [
        'novo' => 'Novo',
        'em_analise' => 'Em análise',
        'aprovado' => 'Aprovado',
        'descartado' => 'Descartado',
    ];

    protected $fillable = [
        'nome', 'email', 'cargo_desejado', 'cidade', 'nivel', 'resumo', 'status',
    ];
}
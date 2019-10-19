<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    // Campos que irão ser inseridos pelo usuário
    protected $fillable = [
        'nome', 'data_nascimento', 'sexo', 'telefone', 'endereco'
    ];

    // Guarda os campos, ou seja impede que dados seja inseridos nos mesmos
    protected $guarded = [
        'id', 'created_at', 'update_at'
    ];

    protected $table = 'funcionarios';
}

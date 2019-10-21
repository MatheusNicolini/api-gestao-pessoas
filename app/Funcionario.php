<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function getDataNascimentoAttribute($valorData) {
        $data = Carbon::createFromFormat('Y-m-d', $valorData);

        return $data->format('d/m/Y');
    }

    protected $table = 'funcionarios';
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Importando Model Funcionário
use App\Funcionario;

class FuncionariosController extends Controller
{
    // Método listar funcionários
    public function index() {
       return Funcionario::all();
    }

    // Método listar funcionário específico
    public function show(Funcionario $id) {
        return $id;
        // return response()->json(['data' => ['funcionario' => $id]]);
    }

    // Cadastrar funcionários
    public function store(Request $request) {
        // Cria um objeto Funcionário
        $funcionario = new Funcionario();
        $funcionario->nome            = $request->nome;
        $funcionario->data_nascimento = $request->data_nascimento;
        $funcionario->sexo            = $request->sexo;
        $funcionario->telefone        = $request->telefone;
        $funcionario->endereco        = $request->endereco;
        $funcionario->save();

        // Retorna um json com os dados cadastrados
        return response()->json($funcionario, 201);
    }

    // Atualiza funcionário específico
    public function update(Request $request, $id) {
        // Pega o id do funcionário e se caso não existir retorna um erro
        $funcionario = Funcionario::findOrFail($id);
        if($request->nome) { $funcionario->nome = $request->nome; }
        if($request->data_nascimento) { $funcionario->data_nascimento = $request->data_nascimento; }
        if($request->sexo) { $funcionario->sexo = $request->sexo; }
        if($request->telefone) { $funcionario->telefone = $request->telefone; }
        if($request->endereco) { $funcionario->endereco = $request->endereco; }
        $funcionario->save();

        // Retorna um json com os dados que foram editados
        return response()->json($funcionario, 201);
    }

    // Deletar o funcionário específico
    public function destroy(Funcionario $id) {
        $id->delete();
        return response()->json(['data' => ['msg' => 'Produto ' . $id->nome . ' deletado com sucesso']], 200);
    }
}

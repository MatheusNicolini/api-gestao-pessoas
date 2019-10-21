<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Importando Model Funcionário
use App\Funcionario;

class FuncionariosController extends Controller
{   
    // Método listar funcionários
    public function index() {
        return response()->json([ 'funcionarios' => Funcionario::all() ]);
    }

    // Método listar funcionário específico
    public function show($id) {
        // Pega o id do funcionário e se caso não existir retorna null
        $funcionario = Funcionario::find($id);

        if($funcionario == null) {
            $error = [ 'error' => [ 'message' => 'Esse funcionário não existe', 'code' => '404' ] ];
            return response()->json($error);
        } 
        else {
            return response()->json($funcionario);
        }
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

        if($funcionario->nome != "" && $funcionario->data_nascimento != "" && $funcionario->sexo != "" && $funcionario->telefone != "" && $funcionario->telefone != "" && $funcionario->endereco != "") {
            $funcionario->save();
        
            // Retorna um json com os dados cadastrados
            return response()->json($funcionario, 201);
        }
        else {
            $error = ['error' => [ 'message' => 'Os campos não foram todos preenchidos', 'code' => '404' ]];
            return response()->json($error);
        }
    }

    // Atualiza funcionário específico
    public function update(Request $request, $id) {
        // Pega o id do funcionário e se caso não existir retorna null
        $funcionario = Funcionario::find($id);

        if($funcionario == null) {
            $error = ['error' => [ 'message' => 'Esse funcionário não existe', 'code' => '404' ]];
            return response()->json($error);
        }
        else {
            if($request->nome) { $funcionario->nome = $request->nome; }
            if($request->data_nascimento) { $funcionario->data_nascimento = $request->data_nascimento; }
            if($request->sexo) { $funcionario->sexo = $request->sexo; }
            if($request->telefone) { $funcionario->telefone = $request->telefone; }
            if($request->endereco) { $funcionario->endereco = $request->endereco; }
            $funcionario->save();

            // Retorna um json com os dados que foram editados
            return response()->json($funcionario, 201);
        }
    }

    // Deletar o funcionário específico
    public function destroy($id) {
        $funcionario = Funcionario::find($id);
        

        if($funcionario == null) {
            $error = ['error' => [ 'message' => 'Esse funcionário não existe', 'code' => '404' ]];
            return response()->json($error);
        }
        else {
            $funcionario->delete();
            return response()->json([ 'msg' => 'Funcionário deletado com sucesso', 'code' => '200' ]);
        }
        
    }
}

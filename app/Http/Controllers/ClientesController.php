<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Clientes::get();
        return view('listagem', compact('clientes'));
    }

    public function create()
    {
        return view('cadastro');
    }

    public function store(Request $request)
    {
        $orgDate = $request->datanascimento;
        $newDate = date("Y-m-d", strtotime($orgDate));

        if (Clientes::create([
            'nome' => $request->nome,
            'data_nasc' => $newDate,
            'sexo' => $request->sexo,
            'endereco' => $request->endereco,
            'cidade' => $request->cidade,
            'cep' => $request->cep,
            'estado' => $request->estado,
            'complemento' => $request->complemento,
            'numero' => $request->numero,
            'bairro' => $request->bairro
        ]))
            return json_encode(["status" => 200, "message" => "Cliente criado com sucesso!", "success" => true]);
        else
            return json_encode(["status" => 200, "message" => "Erro ao salvar cliente", "success" => false]);
    }

    public function edit($id)
    {
        $cliente = Clientes::findOrFail($id);
        return view('edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Clientes::findOrFail($id);
        $orgDate = $request->datanascimento;
        $newDate = date("Y-m-d", strtotime($orgDate));

        if ($cliente->update(
            [
                'nome' => $request->nome,
                'data_nasc' => $newDate,
                'sexo' => $request->sexo,
                'endereco' => $request->endereco,
                'cidade' => $request->cidade,
                'cep' => $request->cep,
                'estado' => $request->estado,
                'complemento' => $request->complemento,
                'numero' => $request->numero,
                'bairro' => $request->bairro
            ]
        ))
            return json_encode(["status" => 200, "message" => "Cliente atualizado com sucesso!", "success" => true]);
        else
            return json_encode(["status" => 200, "message" => "Erro ao atualizar cliente", "success" => false]);
    }

    public function delete($id)
    {
        $cliente = Clientes::findOrFail($id);
        if ($cliente->delete())
            return json_encode(["status" => 200, "message" => "Cliente excluído com sucesso!", "success" => true]);
        else
            return json_encode(["status" => 200, "message" => "Erro ao excluir cliente", "success" => false]);
    }
}

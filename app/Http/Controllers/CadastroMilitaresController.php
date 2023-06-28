<?php

namespace App\Http\Controllers;

use App\Models\militar;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class CadastroMilitaresController extends Controller
{
    public function index()
    {

        $militares = militar::all();

        return view('cadastromilitar', ['militares' => $militares]);
    }

    public function create()
    {
        $militares = militar::all();
        return view('cadastromilitar', ['militares' => $militares]);
    }

    public function store(Request $request)
    {

        if (is_numeric($request->input('nome_guerra'))) {
            $msg = 'Não é permitido número!';
        } elseif (empty($request)) {
            $msg = "Preencha todos os dados!";
        } else {
            militar::create($request->all());
            $msg = "Cadastrado com sucesso!";
        }

        return redirect()->route('cadastro-militar')->with('msg', $msg);
    }

    public function edit($id)
    {

        $militar = militar::where('id', $id)->first();

        if (!empty($militar)) {
            return view('editmilitar', ['militares' => $militar]);

        } else {
            return redirect()->route('cadastro-militar');
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'posto' => $request->posto,
            'nome_guerra' => $request->nome_guerra,
        ];

        militar::where('id', $id)->update($data);

        $msg = 'Atualizado com sucesso!';

        return redirect()->route('cadastro-militar')->with('msg', $msg);


    }

    public function destroy($id)
    {
        militar::where('id', $id)->delete();

        $msg = 'Deletado com sucesso!';

        return redirect()->route('cadastro-militar')->with('msg', $msg);
    }
}

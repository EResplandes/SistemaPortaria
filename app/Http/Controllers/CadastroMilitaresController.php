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
        $VerificarPosto = $request->input('posto');
        $VerificarNome = $request->input('nome_guerra');
        $ValidaNome =  militar::where('nome_guerra', $VerificarNome)->first();
        $validaPosto = militar::where('nome_guerra', $VerificarNome)->value('posto');

        if(is_numeric($request->input('nome_guerra'))) 
        {
            $msg = 'Não é permitido número!';
        } 
        elseif(empty($request))
        {
            $msg = "Preencha todos os dados!";
        }
        else
        {   
            // Verifica se o campo input('nome_guerra' está vazio)
            if($ValidaNome == null){
                // Verifica se o posto que veio da query $validaPosto é igual o posto que veio do input
                if($validaPosto == $VerificarPosto){
                    $msg = "$VerificarNome já está cadastrado no sistema";  
                } else {
                    militar::create($request->all());
                    $msg = "Cadastrado com sucesso!";
                }
            } else {
                $msg = "$VerificarNome já está cadastrado no sistema";
            }        
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

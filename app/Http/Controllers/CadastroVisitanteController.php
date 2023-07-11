<?php

namespace App\Http\Controllers;

use App\Models\Visitante;
use Illuminate\Http\Request;

class CadastroVisitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitantes = Visitante::all();
        return view('cadastrovisitante', ['visitantes' => $visitantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $visitantes = Visitante::all();
        return view('cadastrovisitante', ['visitantes' => $visitantes]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $this->validate($request, [
            'nome_completo' =>'required|string',
            'cpf' => 'required',
            'telefone' => 'required',
            'imagem' => 'required|file|mimes:png,jpg,jpeg',

        ],[
            'nome_completo.required'=> "O campo usuário é obrigatório",
            'cpf.required' => "O campo senha é obrigatório",
            'telefone.required' => "O campo telefone é obrigatório!",
            'imagem.mimes' => 'O campo imagem tem que ser png, jpeg, jpg'
        ]);

        $imagem = $request->file('imagem');
        // Valida CPF
        $VerificaCpf = $request->input('cpf');
        $ValidaCpf = Visitante::where('cpf', $VerificaCpf)->first();

        // Valida Telefone
        $VerficaTelefone = $request->input('telefone');
        $ValidaTelefone = Visitante::where('telefone', $VerficaTelefone)->first();

        if (is_numeric($request->input('nome_completo'))) {
            $msg = 'Não é permitido número!';
        } elseif (empty($request)) {
            $msg = "Preencha todos os dados!";
        } elseif (!empty($ValidaTelefone)){
            $msg = "Telefone já cadastrados!";
        } elseif (!empty($ValidaCpf)){
            $msg = "CPF já está cadastrado!";
        } elseif (empty($imagem)) {
            $msg = "Imagem obrigatória!";
        }
        else {
            $imagem_urn = $imagem->store('visitantes', 'public');
            
            Visitante::create([
                'nome_completo' => $request->input('nome_completo'),
                'cpf' => $request->input('cpf'),
                'telefone' => $request->input('telefone'),
                'url_imagem' => $imagem_urn,
            ]);

            // Visitante::create($request->all());
            $msg = "Cadastrado com sucesso!";
        }

        return redirect()->route('cadastro-visitante')->with('msg', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visitantes = Visitante::where('id', $id)->first();

        if (!empty($visitantes)) {
            return view('editvisitante', ['visitantes' => $visitantes]);

        } else {
            return redirect()->route('cadastro-visitante');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'nome_completo' => $request->nome_completo,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
        ];

        Visitante::where('id', $id)->update($data);

        $msg = 'Atualizado com sucesso!';

        return redirect()->route('cadastro-visitante')->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Visitante::where('id', $id)->delete();

        $msg = 'Deletado com sucesso!';

        return redirect()->route('cadastro-visitante')->with('msg', $msg);
    }
}

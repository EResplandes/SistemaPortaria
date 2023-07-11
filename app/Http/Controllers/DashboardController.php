<?php

namespace App\Http\Controllers;

use App\Models\EntradaVisitante;
use App\Models\militar;
use App\Models\SaidaMilitar;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;
use Carbon\Carbon;
use App\Models\Visitante;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logout(){

        Auth::logout();

        return view('login');


    }

    public function permissao(){
        $user = Auth::user();
          
        $Usuario = $user->name;

        return view('layouts.app', ['Usuario' => $Usuario]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        $user = Auth::user();


        // Consulta CPF
        $inputCPF = $request->input('cpf');
        if (!empty($inputCPF)) {
            $Visitante =  Visitante::where('cpf', $inputCPF)->first();
            if (!empty($Visitante)) {

                $dataAtual = Carbon::now()->toDateString(); // Obtém a data atual no formato 'Y-m-d'

                $militares = militar::all();
                $Visitante =  Visitante::where('cpf', $inputCPF)->first();

                // Retorna a lista de registo do dia atuak para o controle de saida de militares
                $saidaMilitares = SaidaMilitar::join('militars', 'saida_militars.militars_id', '=', 'militars.id')
                    ->whereDate('saida_militars.data', $dataAtual)
                    ->orderByDesc('saida_militars.hora_saida')
                    ->select('saida_militars.*', 'militars.posto', 'militars.nome_guerra')
                    ->get();

                // Retorna a lista de registros do dia atual para o contrle de entrada de visitantes
                $entradaVisitante = EntradaVisitante::join('visitantes', 'entrada_visitante.visitante_id', '=', 'visitantes.id')
                    ->whereDate('entrada_visitante.data', date('Y-m-d'))
                    ->orderByDesc('entrada_visitante.hora_entrada')
                    ->select('entrada_visitante.*', 'visitantes.nome_completo', 'visitantes.telefone')
                    ->get();

                $msg = 'Visitante selecionado!';
                return view('dashboard', ['Visitante' => $Visitante, 'militares' => $militares, 'SaidaMilitares' => $saidaMilitares, 'EntradaVisitante' => $entradaVisitante, 'msg' => $msg]);

            } else {
                $msgError = 'Visitante não encontrado!';
                return redirect()->route('Dashboard')->with('msgError', $msgError);
            }
        }
        $militares = militar::all();
        $Visitante =  Visitante::where('cpf', $inputCPF)->first();

        $dataAtual = Carbon::now()->toDateString(); // Obtém a data atual no formato 'Y-m-d'

        // Retorna a lista de registo do dia atuak para o controle de saida de militares
        $saidaMilitares = SaidaMilitar::join('militars', 'saida_militars.militars_id', '=', 'militars.id')
            ->whereDate('saida_militars.data', $dataAtual)
            ->orderByDesc('saida_militars.hora_saida')
            ->select('saida_militars.*', 'militars.posto', 'militars.nome_guerra')
            ->get();

        // Retorna a lista de registros do dia atual para o contrle de entrada de visitantes
        $entradaVisitante = EntradaVisitante::join('visitantes', 'entrada_visitante.visitante_id', '=', 'visitantes.id')
            ->whereDate('entrada_visitante.data', date('Y-m-d'))
            ->orderByDesc('entrada_visitante.hora_entrada')
            ->select('entrada_visitante.*', 'visitantes.nome_completo', 'visitantes.telefone')
            ->get();


        // Retorna os militares para o select no dashboar
        $militares = militar::all();
        return view('dashboard', ['Visitante' => $Visitante, 'militares' => $militares, 'SaidaMilitares' => $saidaMilitares, 'EntradaVisitante' => $entradaVisitante]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_numeric($request->input('destino_militar'))) {
            $msgError = 'Não é permitido número no campo de destino!';
            return redirect()->route('Dashboard')->with('msgError', $msgError);
        } elseif ($request->input('militar') === 'vazio') {
            $msgError = "Selecione o militar no campo 'Selecione Militar'!";
            return redirect()->route('Dashboard')->with('msgError', $msgError);
        } else {

            $dataAtual = date('Y/m/d');
            $timezone = new DateTimeZone('America/Sao_Paulo'); // Configura o fuso horário para Brasília
            $dataHora = new DateTime('now', $timezone); // Obtém a data e hora atual considerando o fuso horário
            $horaAtual = $dataHora->format('H:i:s'); // Formata a hora no formato desejado
            $militar = $request->input('militar');
            $destino = $request->input('destino_militar');
            $msg = "Cadastrado com sucesso!";

            $dados = [
                'data' => $dataAtual,
                'hora_saida' => $horaAtual,
                'destino' => $destino,
                'militars_id' => $militar
            ];

            DB::table('saida_militars')->insert($dados);
        }

        return redirect()->route('Dashboard')->with('msg', $msg);
    }

    public function storeVisitante(Request $request)
    {

        if (is_numeric($request->input('destino_visitante'))) {
            $msgError = 'Não é permitido número no campo de destino!';
            return redirect()->route('Dashboard')->with('msgError', $msgError);
        } elseif (is_numeric($request->input('falar'))) {
            $msgError = 'Não é permitido número no campo com quem falar!';
            return redirect()->route('Dashboard')->with('msgError', $msgError);
        } elseif (is_null($request->input('destino_visitante'))) {
            $msgError = 'O campo Destino deve ser preenchido.';
            return redirect()->route('Dashboard')->with('msgError', $msgError);
        } elseif (is_null($request->input('falar'))) {
            $msgError = 'O campo Com quem falar deve ser preenchido';
            return redirect()->route('Dashboard')->with('msgError', $msgError);
        } elseif (is_null($request->input('id_visitante'))) {
            $msgError = 'Não apague o id do visitante!';
            return redirect()->route('Dashboard')->with('msgError', $msgError);
        } else

            $dataAtual = date('Y/m/d');
        $timezone = new DateTimeZone('America/Sao_Paulo'); // Configura o fuso horário para Brasília
        $dataHora = new DateTime('now', $timezone); // Obtém a data e hora atual considerando o fuso horário
        $horaAtual = $dataHora->format('H:i:s'); // Formata a hora no formato desejado
        $destino = $request->input('destino_visitante');
        $falar = $request->input('falar');
        $idVisitante = $request->input('id_visitante');

        $dados = [
            'data' => $dataAtual,
            'hora_entrada' => $horaAtual,
            'destino' => $destino,
            'falar' => $falar,
            'visitante_id' => $idVisitante
        ];

        DB::table('entrada_visitante')->insert($dados);
        $msg = 'Entrada registrada com sucesso!';

        return redirect()->route('Dashboard')->with('msg', $msg);
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
        //
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

        $timezone = new DateTimeZone('America/Sao_Paulo'); // Configura o fuso horário para Brasília
        $dataHora = new DateTime('now', $timezone); // Obtém a data e hora atual considerando o fuso horário

        $data = [
            'hora_retorno' => $dataHora
        ];

        SaidaMilitar::where('id', $id)->update($data);
        $msg = 'Hora do retorno definida com sucesso!';
        return redirect()->route('dashboard')->with('msg', $msg);
    }

    public function updateVisitante($id)
    {
        $timezone = new DateTimeZone('America/Sao_Paulo'); // Configura o fuso horário para Brasília
        $dataHora = new DateTime('now', $timezone); // Obtém a data e hora atual considerando o fuso horário

        $data = [
            'hora_saida' => $dataHora
        ];

        EntradaVisitante::where('id', $id)->update($data);
        $msg = 'Hora da saída registrada com sucesso!';
        return redirect()->route('dashboard')->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

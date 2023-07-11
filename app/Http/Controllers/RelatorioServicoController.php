<?php

namespace App\Http\Controllers;

use App\Models\militar;
use App\Models\SaidaMilitar;
use App\Models\EntradaVisitante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use DateTime;
use DateTimeZone;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('relatorioservico');
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

        $dataAtual = date('d/m/Y', strtotime('today'));
        $timezone = new DateTimeZone('America/Sao_Paulo'); // Configura o fuso horário para Brasília
        $dataHora = new DateTime('now', $timezone); // Obtém a data e hora atual considerando o fuso horário
        $horaAtual = $dataHora->format('H:i:s'); // Formata a hora no formato desejado

        // Relatório de Militar
        $dataInicio = $request->input('data_inicio');
        $dataFim = $request->input('data_fim');
        $graduado = $request->input('graduado');

        $militares = SaidaMilitar::join('militars', 'saida_militars.militars_id', '=', 'militars.id')
            ->where('data', '>=', $dataInicio)
            ->where('data', '<', date('Y-m-d', strtotime($dataInicio . ' + 1 day')))
            ->whereRaw('HOUR(data) < 9')
            ->orderByDesc('saida_militars.hora_saida')
            ->select('saida_militars.*', 'militars.posto', 'militars.nome_guerra')
            ->get();

        $visitantes = EntradaVisitante::join('visitantes', 'entrada_visitante.visitante_id', '=', 'visitantes.id')
            ->where('data', '>=', $dataInicio)
            ->where('data', '<', date('Y-m-d', strtotime($dataInicio . ' + 1 day')))
            ->whereRaw('HOUR(data) < 9')
            ->orderByDesc('entrada_visitante.hora_entrada')
            ->select('entrada_visitante.*', 'visitantes.nome_completo', 'visitantes.telefone')
            ->get();



        $pdf = Pdf::loadView('relatorioservicomilitar', ['militares' => $militares, 'visitantes' => $visitantes, 'data' => $dataAtual, 'hora' => $horaAtual, 'graduado' => $graduado]);
        return $pdf->download('Relatorio-Serviço.pdf');

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
        //
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

<?php

namespace App\Http\Controllers;

use App\Models\militar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\SaidaMilitar;
use DateTime;
use DateTimeZone;

class RelatorioMilitarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $militares = militar::all();

        return view('relatoriomilitar', ['militares' => $militares]);
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

        $idMilitar = $request->input('id');
        $militares = militar::all();

        $saidaMilitares = SaidaMilitar::join('militars', 'saida_militars.militars_id', '=', 'militars.id')
        ->where('militars_id', $idMilitar)
        ->orderByDesc('saida_militars.id')
        ->select('saida_militars.*', 'militars.posto', 'militars.nome_guerra')
        ->get();

        
        $pdf = Pdf::loadView('relatoriomilitararquivo', ['militares' => $militares, 'saidaMilitares' => $saidaMilitares, 'data' => $dataAtual, 'hora' => $horaAtual]);
        return $pdf->download('Relatorio-Saida-Militar.pdf');
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
        return view('dashboard');
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

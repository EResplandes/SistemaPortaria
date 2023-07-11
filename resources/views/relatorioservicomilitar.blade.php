<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Relatório</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>




<body>
    <div style="text-align: right;">
        <p>Relatório gerado no dia: {{ $data }} às {{ $hora }}</p><br>
    </div>
    <div>
        <div class="row">

            <div style="text-align: center;" class="col-12">
                <h3>MINISTÉRIO DA DEFESA</h3>
                <h3>EXÉRCITO BRASILEIRO</h3>
                <h3>GRÁFICA DO EXÉRCITO</h3><br>
                <h3>Relatório de Serviço</h3><br>
            </div>
        </div><br>

        <div class="row">
            <div class="col-12">
                <table style="border: 2px solid black; text-align: center;" class="table">
                    <thead>
                        <tr>
                            <th colspan="7" style=" border: 1px solid black" scope="col-7">
                                Relatório de Saída de Militares Durante o Expediente
                            </th>
                        </tr>
                        <tr>
                            <th style=" border: 1px solid black" scope="col-1">ID</th>
                            <th style=" border: 1px solid black" scope="col-2">Posto</th>
                            <th style=" border: 1px solid black" scope="col-2">Nome de Guerra</th>
                            <th style=" border: 1px solid black" scope="col-2">Data</th>
                            <th style=" border: 1px solid black" scope="col-2">Hora de Saída</th>
                            <th style=" border: 1px solid black" scope="col-2">Hora de Retorno</th>
                            <th style=" border: 1px solid black" scope="col-2">Destino</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($militares as $militar)
                        <tr>
                            <th style=" border: 1px solid black">{{ $militar->id }}</th>
                            <td style=" border: 1px solid black">{{ $militar->posto }}</td>
                            <td style=" border: 1px solid black">{{ $militar->nome_guerra }}</td>
                            <td style=" border: 1px solid black">{{ $militar->data }}</td>
                            <td style=" border: 1px solid black">{{ $militar->hora_saida }}</td>
                            <td style=" border: 1px solid black">{{ $militar->hora_retorno }}</td>
                            <td style=" border: 1px solid black">{{ $militar->destino }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><br>

        <div class="row">
            <div class="col-12">
                <table style="border: 2px solid black; text-align: center;" class="table">
                    <thead>
                        <tr>
                            <th colspan="8" style=" border: 1px solid black" scope="col-7">
                                Relatório de Entrada de Visitantes
                            </th>
                        </tr>
                        <tr>
                            <th style=" border: 1px solid black" scope="col-1">ID</th>
                            <th style=" border: 1px solid black" scope="col-2">Nome</th>
                            <th style=" border: 1px solid black" scope="col-2">Contato</th>
                            <th style=" border: 1px solid black" scope="col-2">Data</th>
                            <th style=" border: 1px solid black" scope="col-1">Hora de Saída</th>
                            <th style=" border: 1px solid black" scope="col-1">Hora de Retorno</th>
                            <th style=" border: 1px solid black" scope="col-2">Destino</th>
                            <th style=" border: 1px solid black" scope="col-2">Falar</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($visitantes as $visitante)
                        <tr>
                            <th style=" border: 1px solid black">{{ $visitante->id }}</th>
                            <td style=" border: 1px solid black">{{ $visitante->nome_completo }}</td>
                            <td style=" border: 1px solid black">{{ $visitante->telefone }}</td>
                            <td style=" border: 1px solid black">{{ $visitante->data }}</td>
                            <td style=" border: 1px solid black">{{ $visitante->hora_entrada }}</td>
                            <td style=" border: 1px solid black">{{ $visitante->hora_saida }}</td>
                            <td style=" border: 1px solid black">{{ $visitante->destino }}</td>
                            <td style=" border: 1px solid black">{{ $visitante->falar }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><br><br>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <hr style="height: 2px; border-top: 3px solid black"; width="98%">
                    <p>{{ $graduado }}</p>
                    <p>Graduado de Dia</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>



</html>
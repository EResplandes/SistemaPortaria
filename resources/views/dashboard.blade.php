@extends('layouts.app')

@section('Conteudo')

<div class="container pt-5">


  <!-- Botão para Abrir Modal de Saída de Militares Durante o Expediente -->
  <div class="row">
    <div class="btn-group" role="group" aria-label="Basic example">
      
      <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
          <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
          <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
        </svg>
        Registrar Entrada de Visitante
      </button>
      <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
          <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
          <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
        </svg>
        Registrar Saída de Militar
      </button>
      <!-- <button type="button" class="btn btn-primary">Registrar Entrada de Militar</button> -->
    </div>
  </div>

  <!--  Collapso para Abrir Modal de Saída de Militares Durante o Expediente -->
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
      <div class="card card-body" style="width: 100%;">
        <form method="POST" action="{{ route('saida-militar-store') }}">
          @csrf
          {{ csrf_field() }}
          <div class="row">
            <div class="col-sm-3">
              <label for="lastName" class="form-label">Selecione o militar:</label>
              <select name="militar" class="form-select" aria-label="Default select example" required>
                <option value="vazio" selected>Selecione...</option>
                @foreach($militares as $militar)
                <option value="{{ $militar->id }}">{{ $militar->posto }} {{ $militar->nome_guerra }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-3">
              <label for="lastName" class="form-label">Hora Atual:</label>
              <input type="time" id="hora_atual" name="hora_atual" class="form-control" value="{{ date('H:i') }}" disabled>
            </div>
            <div class="col-sm-3">
              <label for="lastName" class="form-label">Insira o destino:</label>
              <input value="" name="destino_militar" type="text" class="form-control" id="lastName" placeholder="Ex: QGEx" value="" required>
              <div class="invalid-feedback">
                O campo é obrigatório!
              </div>
            </div>
            <button type="submit" class="btn btn-primary col-1 m-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
              </svg>
              Registrar Saída</button>
            <a class="col-1 btn btn-success m-1" href="{{ route('cadastro-militar') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
              </svg>
              Cadastrar Militar</a>
          </div>
        </form>
        <hr class="mt-2">
      </div><br>
      <div class="px-5" style="overflow-y: scroll; height: 400px">
        <h3>Lista de Militares</h3>
        <table class="table table-hover mt-3 p-1">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Posto</th>
              <th scope="col">Nome Guerra</th>
              <th scope="col">Hora de Saída</th>
              <th scope="col">Hota de Retorno</th>
              <th scope="col">Destino</th>
              <th scope="col">...</th>
            </tr>
          </thead>
          <tbody>
            @foreach($SaidaMilitares as $SaidaMilitar)
            <tr>
              <th scope="row">{{ $SaidaMilitar->id }}</th>
              <td>{{ $SaidaMilitar->posto }}</td>
              <td>{{ $SaidaMilitar->nome_guerra }}</td>
              <td>{{ $SaidaMilitar->hora_saida }}</td>
              <td>{{ $SaidaMilitar->hora_retorno }}</td>
              <td>{{ $SaidaMilitar->destino }}</td>
              <td>
                <form method="POST" action="{{ route('saida-militar-update', ['id' => $SaidaMilitar->id ?? '']) }}">
                  @csrf
                  @method('PUT')
                  {{ csrf_field() }}
                  @if(empty($SaidaMilitar->hora_retorno))
                  <button type="submit" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                    </svg>
                    Definir Retorno
                  </button>
                  @else
                  <button type="submit" class="btn btn-info disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                      <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                      <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                    </svg>
                    Retorno Definido
                  </button>
                  @endif
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Collapso do Modal de Visitantes -->
  <div class="collapse show " id="collapseExample2">
    <div class="card card-body">
      <form method="POST" action="{{ route('entrada-visitante-consulta') }}">
        @csrf
        {{ csrf_field() }}
        <div class="row">
        <div>
            <h5>Buscar Visitante</h5>
            <hr>
          </div>
          <div class="col-6">
            <label for="lastName" class="form-label">CPF:</label>
            <input name="cpf" class="form-control" type="text" id="cpf" maxlength="14" placeholder="Digite o CPF" oninput="formatarCPF(this)" required>
          </div>
          <div class="col-3">
            <label for="lastName" class="form-label">Tem cadastro!</label><br>
            <button type="submit" class="btn btn-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
              </svg>
              Pesquisar</button>
          </div>
          <div class="col-3">
            <label for="lastName" class="form-label">Não tem cadastro!</label><br>
            <a class="btn btn-success m-1" href="{{ route('cadastro-visitante') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
              </svg>
              Cadastrar Visitante</a>
          </div>
        </div>
      </form>
      <hr>
      <form method="POST" action="{{ route('entrada-visitante-store') }}">
        @csrf
        {{ csrf_field() }}
        <div class="row">
          <div>
            <h5>Dados do Visitante</h5>
            <hr>
          </div>
          <div class="col-sm-3">
            <label for="lastName" class="form-label">ID Visitante:</label>
            <input value="{{ isset($Visitante->id) ? $Visitante->id : 'Não selecionado' }}" type="number" id="id_visitante" name="id_visitante" class="form-control">
          </div>
          <div class="col-sm-3">
            <label for="lastName" class="form-label">Nome Completo:</label>
            <input value="{{ isset($Visitante->nome_completo) ? $Visitante->nome_completo : 'Não selecionado' }}" type="text" id="hora_atual" name="nome_completo_visitante" class="form-control" disabled>
          </div>
          <div class="col-sm-3">
            <label for="lastName" class="form-label">CPF:</label>
            <input value="{{ isset($Visitante->cpf) ? $Visitante->cpf : 'Não selecionado' }}" type="text" id="hora_atual" name="cpf" class="form-control" disabled>
          </div>
          <div class="col-sm-3">
            <label for="lastName" class="form-label">Telefone:</label>
            <input value="{{ isset($Visitante->telefone) ? $Visitante->telefone : 'Não selecionado' }}" type="text" id="hora_atual" name="telefone" class="form-control" disabled>
          </div>
        </div>
        <hr><br>
        <div class="row">
          <div class="col-sm-3">
            <label for="lastName" class="form-label">Hora Atual:</label>
            <input type="time" id="hora_atual" name="hora_atual" class="form-control" value="{{ date('H:i') }}" disabled>
          </div>
          <div class="col-sm-3">
            <label for="lastName" class="form-label">Insira o destino:</label>
            <input value="" name="destino_visitante" type="text" class="form-control" id="lastName" placeholder="Ex: QGEx" value="" required>
            <div class="invalid-feedback">
              O campo é obrigatório!
            </div>
          </div>
          <div class="col-sm-3">
            <label for="lastName" class="form-label">Com quem falar:</label>
            <input value="" name="falar" type="text" class="form-control" id="lastName" placeholder="Ex: QGEx" value="" required>
            <div class="invalid-feedback">
              O campo é obrigatório!
            </div>
          </div>
          <button type="submit" class="btn btn-primary col-2 m-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
              <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
            </svg>
            Registrar Entrada</button>
      </form>
      <hr class="mt-2">
    </div><br>
    <div class="px-5" style="overflow-y: scroll; height: 400px;">
      <h3>Lista de Visitantes</h3>
      <table class=" table table-hover mt-3 p-1">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome Completo</th>
            <th scope="col">Telefone</th>
            <th scope="col">Hora Entrada</th>
            <th scope="col">Hora Saída</th>
            <th scope="col">Destino</th>
            <th scope="col">Falar</th>
            <th scope="col">...</th>
          </tr>
        </thead>
        <tbody>
          @foreach($EntradaVisitante as $EntradaVisita)
          <tr>
            <th scope="row">{{ $EntradaVisita->id }}</th>
            <td>{{ $EntradaVisita->nome_completo }}</td>
            <td>{{ $EntradaVisita->telefone }}</td>
            <td>{{ $EntradaVisita->hora_entrada }}</td>
            <td>{{ $EntradaVisita->hora_saida }}</td>
            <td>{{ $EntradaVisita->destino }}</td>
            <td>{{ $EntradaVisita->falar }}</td>
            <td>
              <form method="POST" action="{{ route('entrada-visitante-update', ['id' => $EntradaVisita->id ?? '']) }}">
                @csrf
                @method('PUT')
                {{ csrf_field() }}
                @if(empty($EntradaVisita->hora_saida))
                <button type="submit" class="btn btn-success">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                  </svg>
                  Definir Saída
                </button>
                @else
                <button type="submit" class="btn btn-info disabled">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                  </svg>
                  Saída Definida
                </button>
                @endif
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>


@if (session('msgError'))
<div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('msgError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif

@if (session('msg'))
<div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('msg') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif

<script>
  // Obtém o elemento do campo de input pelo id
  var campoHora = document.getElementById('hora_atual');

  // Função para atualizar a hora
  function atualizarHora() {
    // Obtém a hora atual
    var dataAtual = new Date();
    var horaAtual = dataAtual.getHours();
    var minutosAtual = dataAtual.getMinutes();

    // Formata a hora e os minutos para o formato HH:MM
    var horaFormatada = horaAtual.toString().padStart(2, '0');
    var minutosFormatados = minutosAtual.toString().padStart(2, '0');

    // Define o valor do campo de input como a hora atual
    campoHora.value = horaFormatada + ':' + minutosFormatados;
  }

  // Atualiza a hora a cada segundo (1000 milissegundos)
  setInterval(atualizarHora, 1000);

  // Abrir e fechar modal
  const myModal = document.getElementById('myModal')
  const myInput = document.getElementById('myInput')

  myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
  })

  // Valida CPF
  function formatarCPF(input) {
    let cpf = input.value;

    // Remove qualquer caractere que não seja número
    cpf = cpf.replace(/\D/g, '');

    // Adiciona pontos e hífen conforme a formatação do CPF
    if (cpf.length > 3 && cpf.length <= 6) {
      cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
    } else if (cpf.length > 6 && cpf.length <= 9) {
      cpf = cpf.replace(/(\d{3})(\d{3})(\d)/, '$1.$2.$3');
    } else if (cpf.length > 9) {
      cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d)/, '$1.$2.$3-$4');
    }

    // Atualiza o valor do input com o CPF formatado
    input.value = cpf;
  }

  setTimeout(function() {
    var alertContainer = document.getElementById('alert-container');
    alertContainer.remove();
  }, 5000); // Tempo em milissegundos (5 segundos)
</script>


@endsection
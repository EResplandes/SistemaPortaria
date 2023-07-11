@extends('layouts.app')

@section('Conteudo')

<?php
if (isset($_POST['capturar'])) {
  $imagem = $_POST['imagem'];
  $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagem));
  $nome_arquivo = "foto.jpg";
  file_put_contents($nome_arquivo, $data);
}
?>

<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Cadastro de Visitante</h2>
    </div>
    @if (session('msg'))
    <div class="alert alert-info">
      {{ session('msg') }}
    </div>
    @endif
    <div class="col-md-12 col-lg-12 border p-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
      <h4 class="mb-3">Formulário</h4>
      <div class="row">
        <div class="col-12">
          <video style="border:solid 2px white;" id="video" height="200" autoplay></video>
          <canvas id="canvas" width="640" height="480" style="display: none;"></canvas>
          <button class="btn btn-success" onclick="capturarFoto()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
              <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
              <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" />
            </svg>
            Capturar Foto</button>
        </div>
      </div>
      <hr>
      <form onsubmit="return validarFormulario()" method="POST" action="{{ route('cadastro-visitante-store') }}" class="needs-validation" novalidate enctype="multipart/form-data">
        @csrf
        {{ csrf_field() }}
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="lastName" class="form-label">Nome Completo:</label>
            <input name="nome_completo" type="text" class="form-control" id="lastName" placeholder="Insira o nome completo do visitante..." value="" required>
            <div class="invalid-feedback">
              O campo é obrigatório!
            </div>
          </div>
          <div class="col-sm-6">
            <label for="lastName" class="form-label">CPF:</label>
            <input name="cpf" class="form-control" type="text" id="cpf" maxlength="14" placeholder="Digite o CPF" oninput="formatarCPF(this)" required>
            <div class="invalid-feedback">
              O campo é obrigatório!
            </div>
          </div>
          <div class="col-sm-6">
            <label for="lastName" class="form-label">Telefone:</label>
            <input name="telefone" class="form-control" type="text" id="telefone" maxlength="15" placeholder="Digite o telefone" oninput="formatarTelefone(this)" required>
            <div class="invalid-feedback">
              O campo é obrigatório!
            </div>
          </div>
          <div class="col-sm-6">
            <label for="lastName" class="form-label">Foto:</label>
            <input name="imagem" class="form-control" type="file" id="telefone" maxlength="15" placeholder="Digite o telefone" oninput="formatarTelefone(this)" required>
            <div class="invalid-feedback">
              O campo é obrigatório!
            </div>
          </div>

          <button class="w-100 btn btn-primary btn-lg" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
              <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
              <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
            </svg>
            Cadastrar Visitante</button>
      </form>

    </div>
    <br>
</div>
</main><br>
<div>
  <h1>Lista de Visitantes</h1>
  <table class="table table-striped ">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">Telefone</th>
        <th scope="col">...</th>
      </tr>
    </thead>
    <tbody>
      @foreach($visitantes as $visitante)
      <tr>
        <th scope="row">{{ $visitante->id }}</th>
        <td>{{ $visitante->nome_completo }}</td>
        <td>{{ $visitante->cpf }}</td>
        <td>{{ $visitante->telefone }}</td>
        <td>
          <a href="{{ route('cadastro-visitante-edit', ['id' => $visitante->id ?? '']) }}" class="btn btn-success me-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
            </svg>
            Editar
          </a>
          @auth
          @if(auth()->user()->name == 'resplandes')
          <form method="POST" action="{{ route('cadastro-visitante-destroy', ['id' => $visitante->id ?? '']) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
              </svg>
              Excluir
            </button>
          </form>
          @endif
          @endauth
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<script>
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

  // Valida Telefone
  function formatarTelefone(input) {
    let telefone = input.value;

    // Remove qualquer caractere que não seja número
    telefone = telefone.replace(/\D/g, '');

    // Verifica o tamanho do número de telefone para aplicar a formatação correta
    if (telefone.length <= 10) {
      telefone = telefone.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
    } else {
      telefone = telefone.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
    }

    // Atualiza o valor do input com o telefone formatado
    input.value = telefone;
  }
</script>

<script>
  navigator.mediaDevices.getUserMedia({
      video: true
    })
    .then(function(stream) {
      var video = document.getElementById('video');
      video.srcObject = stream;
      video.play();
    });

  function capturarFoto() {
    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    var imagem = canvas.toDataURL("{{ route('cadastro-visitante-store') }}");

    $.ajax({
      type: "POST",
      url: "",
      data: {
        imagem: imagem,
        capturar: true
      },
      success: function(response) {
        window.location.href = response;
      }
    });
  }
</script>
<script>
  function capturarFoto() {
    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    var imagem = canvas.toDataURL('image/jpeg');

    // Cria um link de download
    var link = document.createElement('a');
    link.href = imagem;
    link.download = 'foto.jpg';

    // Aciona o link de download
    link.click();
  }
</script>



@endsection
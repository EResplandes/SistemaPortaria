@extends('layouts.app')

@section('Conteudo')
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Cadastro de Visitante</h2>
    </div>
    <div class="col-md-12 col-lg-12 border p-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
      <h4 class="mb-3">Formulário</h4>
      <hr>
      <form method="POST" action="" class="needs-validation" novalidate>
        <div class="row g-3">

          <div class="col-sm-6">
            <label for="lastName" class="form-label">Nome Completo:</label>
            <input name="motorista" type="text" class="form-control" id="lastName" placeholder="Insira o nome completo do visitante..." value="" required>
            <div class="invalid-feedback">
              O campo é obrigatório!
            </div>
          </div>
          <div class="col-sm-6">
            <label for="lastName" class="form-label">CPF:</label>
            <input name="motorista" type="text" class="form-control" id="lastName" placeholder="Insira o CPF" value="" required>
            <div class="invalid-feedback">
              O campo é obrigatório!
            </div>
          </div>
          <div class="col-sm-6">
            <label for="lastName" class="form-label">Telefone:</label>
            <input name="motorista" type="text" class="form-control" id="lastName" placeholder="Insira o telefone" value="" required>
            <div class="invalid-feedback">
              O campo é obrigatório!
            </div>
          </div>

          <button class="w-100 btn btn-primary btn-lg" type="submit">Cadastrar Visitante</button>
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
      <tr>
        <th scope="row">1</th>
        <td>Eduardo Castro Resplandes</td>
        <td>000.000.000-00</td>
        <td>(61) 98130-5023</td>
        <td>
          <button type="button" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
            </svg>
            Editar
          </button>
          <button type="button" class="btn btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
            </svg>
            Excluir
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
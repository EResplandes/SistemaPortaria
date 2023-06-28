@extends('layouts.app')

@section('Conteudo')
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Cadastro de Militar</h2>
    </div>
    @if (session('msg'))
            <div class="alert alert-info">
              {{ session('msg') }}
            </div>
            @endif
    <div class="col-md-12 col-lg-12 border p-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
      <h4 class="mb-3">Formulário</h4>
      <hr>
      <form method="POST" action="{{ route('cadastro-militar-store') }}" class="needs-validation" novalidate>
        @csrf
        {{ csrf_field() }}
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="exampleDataList" class="form-label">Posto</label>
            <input value="" required name="posto" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Selecione...">
            <datalist id="datalistOptions">
              <option value="Soldado EV">
              <option value="Soldado EP">
              <option value="Cabo">
            </datalist>
          </div>
          <div class="col-sm-6">
            <label for="lastName" class="form-label">Nome de Guerra:</label>
            <input value="" name="nome_guerra" type="text" class="form-control" id="lastName" placeholder="Insira o nome de guerra do militar" value="" required>
            <div class="invalid-feedback">
              O campo é obrigatório!
            </div>
          </div>
          <button type="submit" class="w-100 btn btn-primary btn-lg" name="submit">Cadastrar Militar</button>
      </form>
    </div>
    <br>
</div>
</main><br>
<div>
  <h1>Lista de Militares</h1>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Posto</th>
        <th scope="col">Nome de Guerra</th>
        <th class="" scope="col">...</th>
      </tr>
    </thead>
    @foreach($militares as $militar)
    <tbody>
      <tr>
        <th scope="row">{{ $militar->id }}</th>
        <td>{{ $militar->posto }}</td>
        <td>{{ $militar->nome_guerra }}</td>
        <td class=" d-flex">
          <a href="{{ route('cadastro-militar-edit', ['id' => $militar->id ?? '']) }}" class="btn btn-success me-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
            </svg>
            Editar
          </a>
          <form method="POST" action="{{ route('cadastro-militar-destroy', ['id' => $militar->id ?? '']) }}">
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
          
          </form>
          
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div>
@endsection
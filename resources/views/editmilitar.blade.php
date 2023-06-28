@extends('layouts.app')

@section('Conteudo')
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Edição de Militar</h2>
    </div>
    @if (session('msg'))
            <div class="alert alert-info">
              {{ session('msg') }}
            </div>
    @endif
    <div class="col-md-12 col-lg-12 border p-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
      <h4 class="mb-3">Formulário</h4>
      <hr>
      <form method="POST" action="{{ route('cadastro-militar-update', ['id' => $militares->id ?? '']) }}" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        {{ csrf_field() }}
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="exampleDataList" class="form-label">Posto</label>
            <input value="{{ $militares->posto }}" required name="posto" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Selecione...">
            <datalist id="datalistOptions">
              <option value="Soldado EV">
              <option value="Soldado EP">
              <option value="Cabo">
            </datalist>
          </div>
          <div class="col-sm-6">
            <label for="lastName" class="form-label">Nome de Guerra:</label>
            <input value="{{ $militares->nome_guerra }}" name="nome_guerra" type="text" class="form-control" id="lastName" placeholder="Insira o nome de guerra do militar" value="" required>
            <div class="invalid-feedback">
              O campo é obrigatório!
            </div>
          </div>
          <button type="submit" class="w-100 btn btn-success btn-lg" name="submit">Editar Militar</button>
      </form>
    </div>
    <br>
</div>
</main>
</div>
@endsection
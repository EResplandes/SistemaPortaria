@extends('layouts.app')

@section('Conteudo')

<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>Relatório de Saída de Militar</h2>
        </div>
        <div class="col-md-12 col-lg-12 border p-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <h4 class="mb-3">Formulário</h4>
            <hr>

            <form method="POST" action="{{ route('relatorio-militar-store') }}" class="needs-validation" novalidate>
                @csrf
                @method('POST')
                {{ csrf_field() }}
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label for="lastName" class="form-label">Selecione o militar:</label>
                        <select name="id" class="form-select" aria-label="Default select example" required="">
                            <option value="vazio" selected="">Selecione...</option>
                            @foreach($militares as $militar)
                            <option value="{{ $militar->id }}">{{ $militar->posto }} {{ $militar->nome_guerra }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="w-100 btn btn-primary btn-lg" name="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data-fill" viewBox="0 0 16 16">
                            <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z" />
                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1ZM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V8Zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1Zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z" />
                        </svg>
                        Gerar Relatório</button>
            </form>
        </div>
        <br>
</div>
</main><br>
<div>

    @endsection
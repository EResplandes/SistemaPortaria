@extends('layouts.app')

@section('Conteudo')
<div class="container pt-5">
  <div class="accordion" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
          Controle de Entrada de Visitantes
        </button>
      </h2>
      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
        <div class="accordion-body">
          <div class="row shadow-lg p-3 mb-4 bg-body-tertiary rounded">
            <h3 class="col-9"> Controle de Entrada de Visitantes </h3>
            <button class="btn btn-primary col-1 m-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Registrar</button>
            <a class="col-1 btn btn-success m-1" href="{{ route('cadastro-visitante') }}">Cadastrar Visitante</a>
            <hr class="mt-2">
          </div>
          <table class="table table-hover mt-3">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome Completo</th>
                <th scope="col">Hora de Entrada</th>
                <th scope="col">Hota de Saída</th>
                <th scope="col">Destino</th>
                <th scope="col">Com que falar</th>
                <th scope="col">...</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Eduardo Castro Resplandes</td>
                <td>08:37</td>
                <td>08:39</td>
                <td>Expedição</td>
                <td>Cb Paiva</td>
                <td>
                  <button type="button" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                    </svg>
                    Definir Saída
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <br>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
          Controle de Saída de Militares Durante o Expediente
        </button>
      </h2>
      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
        <div class="accordion-body">
          <div class="row shadow-lg p-3 mb-4 bg-body-tertiary rounded">
            <h3 class="col-9"> Controle de Entrada de Visitantes </h3>
            <button class="btn btn-primary col-1 m-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Registrar</button>
            <a class="col-1 btn btn-success m-1" href="{{ route('cadastro-militar') }}">Cadastrar Militar</a>
            <hr class="mt-2">
          </div>
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
              <tr>
                <th scope="row">1</th>
                <td>Soldado EP</td>
                <td>Resplandes</td>
                <td>08:37</td>
                <td>08:39</td>
                <td>Expedição</td>
                <td>
                  <button type="button" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                    </svg>
                    Definir Retorno
                  </button>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
    
    <br>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
          Controle de Entrada de Militares Fora do Expediente
        </button>
      </h2>
      <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
        <div class="accordion-body">
          <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
        </div>
      </div>
    </div>
  </div>
</div>




@endsection
<?php

use App\Http\Controllers\Autenticacao;
use App\Http\Controllers\CadastroMilitaresController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroVisitanteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RelatorioMilitarController;
use App\Http\Controllers\RelatorioServicoController;
use App\Http\Controllers\SaidaMilitarController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::prefix('/login')->group(function(){
    Route::get('/', [Autenticacao::class, 'index'])->name('login');
    Route::post('/autenticar', [Autenticacao::class, 'auth'])->name('auth');
});

Route::prefix('dashboard')->group(function(){
    Route::post('/store', [DashboardController::class, 'store'])->middleware('auth')->name('saida-militar-store');
});

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('Dashboard');
Route::put('/{id}/update', [DashboardController::class, 'update'])->where('id', '[0-9]+')->middleware('auth')->name('saida-militar-update');

// Rota que busca informações do visitante no dashboard e retorna nos inputs
Route::post('/consulta',[DashboardController::class, 'index'])->middleware('auth')->name('entrada-visitante-consulta');
// Rota para registrar entrada de visitantes
Route::post('/store', [DashboardController::class, 'storeVisitante'])->middleware('auth')->name('entrada-visitante-store');
// Define Saída
Route::put('/{id}/atualizar', [DashboardController::class, 'updateVisitante'])->where('id', '[0-9]+')->middleware('auth')->name('entrada-visitante-update');
Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');



Route::prefix('militares')->group(function(){
    Route::get('/', [CadastroMilitaresController::class, 'index'])->middleware('auth')->name('cadastro-militar');
    Route::get('/create', [CadastroMilitaresController::class, 'create'])->middleware('auth')->name('cadastro-militar-create');
    Route::post('/store', [CadastroMilitaresController::class, 'store'])->middleware('auth')->name('cadastro-militar-store');
    Route::get('/{id}/edit', [CadastroMilitaresController::class, 'edit'])->where('id', '[0-9]+')->middleware('auth')->name('cadastro-militar-edit');
    Route::put('/{id}/update', [CadastroMilitaresController::class, 'update'])->where('id', '[0-9]+')->middleware('auth')->name('cadastro-militar-update');
    Route::delete('/delete/{id}', [CadastroMilitaresController::class, 'destroy'])->where('id', '[0-9]+')->middleware('auth')->name('cadastro-militar-destroy');

});

Route::prefix('visitantes')->group(function(){
    Route::get('/' , [CadastroVisitanteController::class, 'index'])->middleware('auth')->name('cadastro-visitante');
    Route::get('/create' , [CadastroVisitanteController::class, 'create'])->middleware('auth')->name('cadastro-visitante-create');
    Route::post('/store' , [CadastroVisitanteController::class, 'store'])->middleware('auth')->name('cadastro-visitante-store');
    Route::get('/{id}/edit', [CadastroVisitanteController::class, 'edit'])->where('id', '[0-9]+')->middleware('auth')->name('cadastro-visitante-edit');
    Route::put('/{id}/update', [CadastroVisitanteController::class, 'update'])->where('id', '[0-9]+')->middleware('auth')->name('cadastro-visitante-update');
    Route::delete('/delete/{id}', [CadastroVisitanteController::class, 'destroy'])->where('id', '[0-9]+')->middleware('auth')->name('cadastro-visitante-destroy');

});

Route::prefix('relatorios')->group(function(){
    Route::get('/', [RelatorioMilitarController::class, 'index'])->name('relatorio-militar-view');
    Route::post('/store', [RelatorioMilitarController::class, 'store'])->name('relatorio-militar-store');
    Route::get('/servico', [RelatorioServicoController::class, 'index'])->name('relatorio-servico-view');
    Route::post('/servico/store', [RelatorioServicoController::class, 'store'])->name('relatorio-servico-store');

});




Route::fallback(function(){
    return "Erro!";
});



// Exibe o conteúdo


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
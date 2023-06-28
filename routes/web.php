<?php

use App\Http\Controllers\CadastroMilitaresController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroVisitanteController;
use App\Http\Controllers\DashboardController;



Route::prefix('militares')->group(function(){
    Route::get('/', [CadastroMilitaresController::class, 'index'])->name('cadastro-militar');
    Route::get('/create', [CadastroMilitaresController::class, 'create'])->name('cadastro-militar-create');
    Route::post('/store', [CadastroMilitaresController::class, 'store'])->name('cadastro-militar-store');
    Route::get('/{id}/edit', [CadastroMilitaresController::class, 'edit'])->where('id', '[0-9]+')->name('cadastro-militar-edit');
    Route::put('/{id}/update', [CadastroMilitaresController::class, 'update'])->where('id', '[0-9]+')->name('cadastro-militar-update');
    
    Route::delete('/delete/{id}', [CadastroMilitaresController::class, 'destroy'])->where('id', '[0-9]+')->name('cadastro-militar-destroy');

});

Route::fallback(function(){
    return "Erro!";
});



// Exibe o conteúdo

Route::get('/cadastro-visitante' , [CadastroVisitanteController::class, 'index'])->name('cadastro-visitante');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
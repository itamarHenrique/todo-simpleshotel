<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| 1. ROTAS DE AUTENTICAÇÃO E PERFIL (Acessíveis apenas se logado)
|--------------------------------------------------------------------------
| Definindo o dashboard e o perfil logo no início.
*/
Route::middleware('auth')->group(function () {
    
    // ⬅️ DEFINIÇÃO DO DASHBOARD (A ROTA FALTANDO)
    // Isso garante que o nome 'dashboard' seja definido para o seu sistema de navegação.
    Route::get('/dashboard', function () {
        // Redireciona o usuário para a página de Tarefas
        return redirect()->route('tarefas.index');
    })->name('dashboard'); 
    
    // Rotas de Gerenciamento de Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| 2. ROTAS DE FUNCIONALIDADE PRINCIPAL (Tarefas)
|--------------------------------------------------------------------------
| Rotas de Tarefas, também protegidas por 'auth'.
*/
Route::middleware('auth')->group(function () {
    
    // Rota Raiz: Redireciona o usuário logado para a lista de tarefas
    Route::get('/', function () {
        return redirect()->route('tarefas.index');
    });

    // Rotas RESTful para a gestão de tarefas
    Route::resource('tarefas', TarefaController::class);
    
    // Rota específica para restaurar tarefas (fora do CRUD padrão)
    Route::post('tarefas/{id}/restore', [TarefaController::class, 'restore'])->name('tarefas.restore');
});


/*
|--------------------------------------------------------------------------
| 3. ROTAS DE AUTENTICAÇÃO DO BREEZE (Login/Registro, Acessíveis a TODOS)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

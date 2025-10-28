<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| 1. ROTAS PROTEGIDAS (Acessíveis APENAS a usuários logados)
|--------------------------------------------------------------------------
| O Breeze cria uma rota de dashboard que já está em 'auth'.
| Podemos mover seu código aqui.
*/
Route::middleware('auth')->group(function () {
    
    // Rota Raiz: Redireciona o usuário logado para a lista de tarefas
    Route::get('/', function () {
        // Redireciona para /tarefas se estiver logado
        return redirect()->route('tarefas.index');
    });

    // Rotas RESTful para a gestão de tarefas
    Route::resource('tarefas', TarefaController::class);
    
    // Rota específica para restaurar tarefas (fora do CRUD padrão)
    Route::post('tarefas/{id}/restore', [TarefaController::class, 'restore'])->name('tarefas.restore');

    // Se quiser manter o dashboard do Breeze, você o faria aqui
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});


/*
|--------------------------------------------------------------------------
| 2. ROTAS DE AUTENTICAÇÃO (Acessíveis a TODOS)
|--------------------------------------------------------------------------
| Este comando carrega as rotas de login, registro, etc., do arquivo auth.php,
| garantindo que elas não estejam sob o middleware 'auth'.
*/

require __DIR__.'/auth.php';

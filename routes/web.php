<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;

Route::match(['get', 'post'], '/', function () {
    return redirect()->route('login');
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});



Route::middleware('auth')->group(function () {

    Route::get('/home', function () {
        return redirect()->route('tarefas.index');
    })->name('home');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::resource('tarefas', TarefaController::class);
    Route::post('tarefas/{id}/restore', [TarefaController::class, 'restore'])->name('tarefas.restore');
    Route::put('tarefas/{tarefa}/concluir', [TarefaController::class, 'concluir'])->name('tarefas.concluir');
});
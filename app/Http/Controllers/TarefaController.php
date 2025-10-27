<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefaRequest;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarefas = Tarefa::when(request('status'), function($consulta){
            $consulta->where('status', request('status'));
        })->orderBy('created_at', 'desc')->paginate(5);

        return view('tarefas.index', compact('tarefas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('tarefas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TarefaRequest $tarefaRequest)
    {
        Tarefa::create($tarefaRequest->validated());
        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        return view ('tarefas.confirm_delete', compact('tarefa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        return view ('tarefas.edit', compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TarefaRequest $tarefaRequest, Tarefa $tarefa)
    {
        $tarefa->update($tarefaRequest->validated());
        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->route('tarefas.index')->with('success', 'Tarefa deletada com sucesso');
    }

    public function restore($id)
    {
        $tarefa = Tarefa::withTrashed()->findOrFail($id);
        $tarefa->restore();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa restaurada com sucesso');
    }
}

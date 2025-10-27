@extends('layouts.app')

@section('title', 'Excluir Tarefa')

@section('content')
<h2>Excluir Tarefa</h2>

<p>Tem certeza que deseja excluir a tarefa <strong>{{ $tarefa->titulo }}</strong>?</p>

<form action="{{ route('tarefas.destroy', $tarefa) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger">Sim, excluir</button>
    <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('content')
<h2>Lista de Tarefas</h2>

<form method="GET" class="mb-3">
    <select name="status" class="form-select w-auto d-inline">
        <option value="">Todos</option>
        <option value="pendente" {{ request('status')=='pendente' ? 'selected' : '' }}>Pendentes</option>
        <option value="concluida" {{ request('status')=='concluida' ? 'selected' : '' }}>Concluídas</option>
    </select>
    <button class="btn btn-primary btn-sm">Filtrar</button>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Título</th>
            <th>Status</th>
            <th>Data de Criação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tarefas as $tarefa)
        <tr>
            <td>{{ $tarefa->titulo }}</td>
            <td>
                <span class="badge {{ $tarefa->status == 'concluida' ? 'bg-success' : 'bg-warning' }}">
                    {{ ucfirst($tarefa->status) }}
                </span>
            </td>
            <td>{{ $tarefa->created_at->format('d/m/Y') }}</td>
            <td>
                <a href="{{ route('tarefas.edit', $tarefa) }}" class="btn btn-sm btn-primary">Editar</a>
                <a href="{{ route('tarefas.show', $tarefa) }}" class="btn btn-sm btn-danger">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $tarefas->links() }}

@endsection

@extends('layouts.app')

@section('title', 'Editar Tarefa')

@section('content')
<h2>Editar Tarefa</h2>

<form action="{{ route('tarefas.update', $tarefa) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Título *</label>
        <input type="text" name="titulo" class="form-control" required value="{{ old('titulo', $tarefa->titulo) }}">
        @error('titulo') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <textarea name="descricao" class="form-control">{{ old('descricao', $tarefa->descricao) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="pendente" {{ $tarefa->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
            <option value="concluida" {{ $tarefa->status == 'concluida' ? 'selected' : '' }}>Concluída</option>
        </select>
    </div>

    <button class="btn btn-primary">Atualizar</button>
    <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection

@extends('layouts.app')

@section('title', 'Nova Tarefa')

@section('content')
<h2>Nova Tarefa</h2>

<form action="{{ route('tarefas.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Título *</label>
        <input type="text" name="titulo" class="form-control" required maxlength="255" value="{{ old('titulo') }}">
        @error('titulo') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <textarea name="descricao" class="form-control">{{ old('descricao') }}</textarea>
    </div>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

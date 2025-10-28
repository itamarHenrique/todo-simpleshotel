@extends('layouts.app')

@section('title', 'Excluir Tarefa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-shadow border-0">
            <div class="card-header bg-danger text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirmar Exclusão
                </h5>
            </div>
            <div class="card-body text-center py-4">
                <div class="mb-4">
                    <i class="fas fa-trash-alt fa-3x text-danger mb-3"></i>
                    <h4>Excluir Tarefa</h4>
                    <p class="text-muted">Tem certeza que deseja excluir a tarefa abaixo?</p>
                </div>

                <div class="alert alert-warning">
                    <strong>"{{ $tarefa->titulo }}"</strong>
                    @if($tarefa->descricao)
                        <br>
                        <small class="text-muted">{{ Str::limit($tarefa->descricao, 100) }}</small>
                    @endif
                </div>

                <p class="text-muted small">
                    <i class="fas fa-info-circle me-1"></i>
                    Esta ação não poderá ser desfeita.
                </p>

                <form action="{{ route('tarefas.destroy', $tarefa) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-lg">
                        <i class="fas fa-trash me-1"></i>Sim, Excluir
                    </button>
                </form>
                <a href="{{ route('tarefas.index') }}" class="btn btn-outline-secondary btn-lg">
                    <i class="fas fa-times me-1"></i>Cancelar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="h4 mb-1">
                    <i class="fas fa-list-check text-primary me-2"></i>Minhas Tarefas
                </h2>
                <p class="text-muted mb-0">Gerencie suas tarefas de forma organizada</p>
            </div>
            <a href="{{ route('tarefas.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>Nova Tarefa
            </a>
        </div>

        <!-- Filtros -->
        <div class="card card-shadow mb-4">
            <div class="card-body">
                <form method="GET" class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="status" class="col-form-label">Filtrar por status:</label>
                    </div>
                    <div class="col-auto">
                        <select name="status" class="form-select">
                            <option value="">Todas as tarefas</option>
                            <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}>Pendentes</option>
                            <option value="concluida" {{ request('status') == 'concluida' ? 'selected' : '' }}>Concluídas</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="fas fa-filter me-1"></i>Filtrar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabela de Tarefas -->
        <div class="card card-shadow">
            <div class="card-body">
                @if($tarefas->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="40%">Título</th>
                                    <th width="15%">Status</th>
                                    <th width="20%">Data de Criação</th>
                                    <th width="25%" class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tarefas as $tarefa)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($tarefa->status == 'concluida')
                                                <i class="fas fa-check-circle text-success me-2"></i>
                                                <span class="text-decoration-line-through text-muted">
                                                    {{ $tarefa->titulo }}
                                                </span>
                                            @else
                                                <i class="fas fa-clock text-warning me-2"></i>
                                                <strong>{{ $tarefa->titulo }}</strong>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge status-badge {{ $tarefa->status == 'concluida' ? 'bg-success' : 'bg-warning' }}">
                                            {{ $tarefa->status == 'concluida' ? 'Concluída' : 'Pendente' }}
                                        </span>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ $tarefa->created_at->format('d/m/Y') }}
                                        </small>
                                    </td>
                                    <td class="text-center action-buttons">
                                        <a href="{{ route('tarefas.edit', $tarefa) }}"
                                           class="btn btn-sm btn-outline-primary" 
                                           title="Editar tarefa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('tarefas.show', $tarefa) }}"
                                           class="btn btn-sm btn-outline-danger"
                                           title="Excluir tarefa">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        @if($tarefa->status == 'pendente')
                                            <form action="{{ route('tarefas.concluir', $tarefa) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="concluida">
                                                <button type="submit" class="btn btn-sm btn-outline-success" title="Marcar como concluída">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginação -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Mostrando {{ $tarefas->firstItem() }} a {{ $tarefas->lastItem() }} de {{ $tarefas->total() }} tarefas
                        </div>
                        <nav>
                            {{ $tarefas->links() }}
                        </nav>
                    </div>
                @else
                    <!-- Estado vazio -->
                    <div class="text-center py-5">
                        <i class="fas fa-clipboard-list fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Nenhuma tarefa encontrada</h5>
                        <p class="text-muted mb-4">Comece criando sua primeira tarefa</p>
                        <a href="{{ route('tarefas.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>Criar Primeira Tarefa
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
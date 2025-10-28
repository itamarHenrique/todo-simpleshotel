@extends('layouts.app')

@section('title', 'Editar Tarefa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-edit me-2"></i>Editar Tarefa
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('tarefas.update', $tarefa) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Título <span class="text-danger">*</span></label>
                        <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" 
                               required value="{{ old('titulo', $tarefa->titulo ) }}" 
                               placeholder="Digite o título da tarefa">
                        @error('titulo')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Descrição</label>
                        <textarea name="descricao" class="form-control @error('descricao') is-invalid @enderror" 
                                  rows="4" placeholder="Descreva os detalhes da tarefa">{{ old('descricao', $tarefa->descricao) }}</textarea>
                        @error('descricao')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="pendente" {{ old('status', $tarefa->status) == 'pendente' ? 'selected' : '' }}>
                                ⏳ Pendente
                            </option>
                            <option value="concluida" {{ old('status', $tarefa->status) == 'concluida' ? 'selected' : '' }}>
                                ✅ Concluída
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('tarefas.index') }}" class="btn btn-outline-secondary me-md-2">
                            <i class="fas fa-arrow-left me-1"></i>Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Atualizar Tarefa
                        </button>
                    </div>
                </form>

                <!-- Informações adicionais -->
                <hr class="my-4">
                <div class="row">
                    <div class="col-md-6">
                        <small class="text-muted">
                            <i class="fas fa-calendar-plus me-1"></i>
                            Criada em: {{ $tarefa->created_at->format('d/m/Y H:i') }}
                        </small>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <small class="text-muted">
                            <i class="fas fa-calendar-edit me-1"></i>
                            Última atualização: {{ $tarefa->updated_at->format('d/m/Y H:i') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
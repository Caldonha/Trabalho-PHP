@extends('app.layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Detalhes da Categoria</h4>
                    <div>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning me-2">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4">
                                <h5 class="text-primary">{{ $category->title }}</h5>
                                <hr>
                            </div>
                            
                            <div class="mb-3">
                                <strong>Descrição:</strong>
                                <p class="mt-2">{{ $category->description ?: 'Nenhuma descrição fornecida.' }}</p>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <strong>Data de Criação:</strong>
                                        <p class="mt-1">{{ $category->created_at->format('d/m/Y H:i:s') }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <strong>Última Atualização:</strong>
                                        <p class="mt-1">{{ $category->updated_at->format('d/m/Y H:i:s') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-4">
                        <form action="{{ route('categories.destroy', $category) }}" 
                              method="POST" 
                              onsubmit="return confirm('Tem certeza que deseja excluir esta categoria? Esta ação não pode ser desfeita.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Excluir Categoria
                            </button>
                        </form>
                        
                        <div>
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning me-2">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="{{ route('categories.index') }}" class="btn btn-primary">
                                <i class="fas fa-list"></i> Ver Todas
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
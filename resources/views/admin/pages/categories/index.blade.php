@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Categorias</li>
        </ol>
    </nav>

    <h1>Categorias <a href="{{ route('categories.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar Categoria</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('categories.search') }}" method="POST" class="form form-inline">
                @csrf
                <div class="form-group">
                    <label for="filter">Filtro:</label>
                    <input id="filter" class="form-control" type="text" name="filter" placeholder="Filtre por nome" value="{{ $filters['filter'] ?? '' }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-dark"><i class="fas fa-pencil-alt"></i></a> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif
            
        </div>
    </div>
@stop
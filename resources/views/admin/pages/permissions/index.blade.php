@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Permissões</li>
        </ol>
    </nav>

    <h1>Permissões <a href="{{ route('permissions.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar permissão</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissions.search') }}" method="POST" class="form form-inline">
                @csrf
                <div class="form-group">
                    <label for="filter">Filtro:</label>
                    <input id="filter" class="form-control" type="text" name="filter" placeholder="Filtre por nome ou descrição" value="{{ $filters['filter'] ?? '' }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="200">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-dark"><i class="fas fa-pencil-alt"></i></a> 
                                <a href="{{ route('permissions.profiles', $permission->id) }}" class="btn btn-info"><i class="fas fa-address-book"></i></a> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
            
        </div>
    </div>
@stop
@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Usuários</li>
        </ol>
    </nav>

    <h1>Usuários <a href="{{ route('users.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar Usuário</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('users.search') }}" method="POST" class="form form-inline">
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
                        <th>E-mail</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-dark"><i class="fas fa-pencil-alt"></i></a> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $users->appends($filters)->links() !!}
            @else
                {!! $users->links() !!}
            @endif
            
        </div>
    </div>
@stop
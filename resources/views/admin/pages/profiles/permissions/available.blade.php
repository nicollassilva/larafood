@extends('adminlte::page')

@section('title', 'Permissões disponíveis do perfil: ' . $profile->name)

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Permissões</li>
        </ol>
    </nav>

    <h1>Permissões disponíveis do perfil <b>{{ $profile->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.permissions.available', $profile->id) }}" method="POST" class="form form-inline">
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
                        <th width="50px">#</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('profiles.permissions.attach', $profile->id) }}" method="POST">
                        @csrf
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                </td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->description }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="500">
                                <button type="submit" class="btn btn-info">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
@stop
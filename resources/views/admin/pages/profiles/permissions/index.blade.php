@extends('adminlte::page')

@section('title', 'Permissões do perfil: ' . $profile->name)

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Permissões</li>
        </ol>
    </nav>

    <h1>Permissões do perfil <b>{{ $profile->name }}</b>
        <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar permissão</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->description }}</td>
                            <td>
                                <a href="{{ route('profiles.permissions.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
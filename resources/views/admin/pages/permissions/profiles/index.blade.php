@extends('adminlte::page')

@section('title', 'Perfis da Permissão: ' . $permission->name)

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Perfis</li>
        </ol>
    </nav>

    <h1>Perfis da Permissão <b>{{ $permission->name }}</b></h1>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
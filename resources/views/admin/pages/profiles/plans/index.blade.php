@extends('adminlte::page')

@section('title', 'Planos do perfil: ' . $profile->name)

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Perfis</li>
            <li class="breadcrumb-item active">Perfil {{ $profile->name }}</li>
        </ol>
    </nav>

    <h1>Planos do perfil <b>{{ $profile->name }}</b></h1>
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
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@extends('adminlte::page')

@section('title', 'Perfis do plano: ' . $plan->name)

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Perfis</li>
            <li class="breadcrumb-item active"><a href="{{ route('plans.profiles', $plan->id) }}">Planos</a></li>
        </ol>
    </nav>

    <h1>Perfis do plano <b>{{ $plan->name }}</b>
        <a href="{{ route('plans.profiles.available', $plan->id) }}" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar perfil</a></h1>
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
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
                            <td>{{ $profile->description }}</td>
                            <td>
                                <a href="{{ route('plans.profiles.detach', [$plan->id, $profile->id]) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
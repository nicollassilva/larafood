@extends('adminlte::page')

@section('title', 'Perfil: ' . $profile->name)

@section('content_header')
    <h1>Detalhes do Perfil <b>{{ $profile->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $profile->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $profile->description }}
                </li>
            </ul>
            @include('admin.includes.alerts')
            <form method="POST" action="{{ route('profiles.destroy', $profile->id) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir perfil</button>
            </form>
        </div>
    </div>
@endsection
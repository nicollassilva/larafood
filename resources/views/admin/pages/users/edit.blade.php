@extends('adminlte::page')

@section('title', 'Editando: ' . $user->name)

@section('content_header')
    <h1>Editando Usuário: <b>{{ $user->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                
                @include('admin.pages.users._partials.form')
            </form>
        </div>
    </div>
@endsection
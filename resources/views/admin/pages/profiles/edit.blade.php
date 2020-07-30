@extends('adminlte::page')

@section('title', 'Editando: ' . $profile->name)

@section('content_header')
    <h1>Editando Perfil: <b>{{ $profile->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update', $profile->id) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
    </div>
@endsection
@extends('adminlte::page')

@section('title', 'Editando: ' . $permission->name)

@section('content_header')
    <h1>Editando Permissão: <b>{{ $permission->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                
                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@endsection
@extends('adminlte::page')

@section('title', 'Criar Novo Usuário')

@section('content_header')
    <h1>Criar Novo Usuário</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST" class="form">
                @csrf
                
                @include('admin.pages.users._partials.form')
            </form>
        </div>
    </div>
@endsection
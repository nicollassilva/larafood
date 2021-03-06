@extends('adminlte::page')

@section('title', 'Criar Novo Plano')

@section('content_header')
    <h1>Criar Novo Plano</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" method="POST" class="form">
                @csrf
                
                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@endsection
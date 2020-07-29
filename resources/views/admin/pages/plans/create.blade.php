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
                <div class="form-group">
                    <label for="text">Nome: </label>
                    <input id="text" placeholder="Nome do plano" name="name" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="text">Preço: </label>
                    <input id="text" placeholder="Preço do plano" name="price" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="text">Descrição: </label>
                    <input id="text" placeholder="Descrição do plano" name="description" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
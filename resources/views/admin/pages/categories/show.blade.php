@extends('adminlte::page')

@section('title', 'Categoria: ' . $category->name)

@section('content_header')
    <h1>Detalhes da Categoria <b>{{ $category->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $category->name }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $category->url }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $category->description }}
                </li>
            </ul>
            @include('admin.includes.alerts')
            <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir Categoria</button>
            </form>
        </div>
    </div>
@endsection
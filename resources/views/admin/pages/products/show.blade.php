@extends('adminlte::page')

@section('title', 'Produto: ' . $product->name)

@section('content_header')
    <h1>Detalhes da Produto <b>{{ $product->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <img src="{{ url('storage/' . $product->image) }}" class="w-25 img-fluid" alt="{{ $product->title }}">
                </li>
                <li>
                    <strong>Nome: </strong> {{ $product->name }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $product->flag }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $product->description }}
                </li>
            </ul>
            @include('admin.includes.alerts')
            <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir Produto</button>
            </form>
        </div>
    </div>
@endsection
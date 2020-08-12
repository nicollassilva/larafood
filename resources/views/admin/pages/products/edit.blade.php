@extends('adminlte::page')

@section('title', 'Editando: ' . $product->name)

@section('content_header')
    <h1>Editando Produto: <b>{{ $product->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST" class="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                @include('admin.pages.products._partials.form')
            </form>
        </div>
    </div>
@endsection
@extends('adminlte::page')

@section('title', 'Criar Nova Categoria')

@section('content_header')
    <h1>Criar Nova Categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" class="form" enctype="multipart/form-data">
                @csrf
                
                @include('admin.pages.products._partials.form')
            </form>
        </div>
    </div>
@endsection
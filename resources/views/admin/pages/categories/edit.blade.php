@extends('adminlte::page')

@section('title', 'Editando: ' . $category->name)

@section('content_header')
    <h1>Editando Categoria: <b>{{ $category->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                
                @include('admin.pages.categories._partials.form')
            </form>
        </div>
    </div>
@endsection
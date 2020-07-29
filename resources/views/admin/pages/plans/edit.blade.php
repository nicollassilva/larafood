@extends('adminlte::page')

@section('title', 'Editando: ' . $plan->name)

@section('content_header')
    <h1>Editando Plano: <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->url) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                
                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@endsection
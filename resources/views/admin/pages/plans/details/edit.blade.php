@extends('adminlte::page')

@section('title', 'Editar o Detalhe ' . $detail->name)

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url)}}">Detalhes</a></li>
            <li class="breadcrumb-item active">Editar detalhe</li>
        </ol>
    </nav>

    <h1>Editar o detalhe <b>{{ $detail->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('details.plan.update', [$plan->url, $detail->id]) }}" method="post">
                @method("PUT")
                @include('admin.pages.plans.details._partials.form')
            </form>
        </div>
    </div>
@endsection
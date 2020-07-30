@extends('adminlte::page')

@section('title', 'Detalhe ' . $detail->name)

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url)}}">Detalhes</a></li>
            <li class="breadcrumb-item active">{{ $detail->name }}</li>
        </ol>
    </nav>

    <h1>Detalhe <b>{{ $detail->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $detail->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('details.plan.destroy', [$plan->url, $detail->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
        </div>
    </div>
@endsection
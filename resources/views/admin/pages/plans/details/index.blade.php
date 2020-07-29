@extends('adminlte::page')

@section('title', 'Detalhes do plano ' . $plan->name)

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
            <li class="breadcrumb-item active">Detalhes</li>
        </ol>
    </nav>

    <h1>Detalhes do Plano <b>{{ $plan->name }}</b> <a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-dark">Criar detalhe</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->name }}</td>
                            <td>
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-dark"><i class="fas fa-pencil-alt"></i></a> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
            
        </div>
    </div>
@stop
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Movimentações</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Conta</th>
                                    <th>Agência</th>
                                    <th>Cliente</th>
                                    <th>Valor</th>
                                    <th>Tipo de Movimentação</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($movements as $movement)
                                    <tr>
                                        <td>{{ str_pad($movement->account->id, 4, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $movement->account->agency->name }}</td>
                                        <td>{{ $movement->account->client->name }}</td>
                                        <td>R$ {{ number_format($movement->value*($movement->type->type == 'D' ? -1 : 1), 2, ',', '.') }}</td>
                                        <td>{{ $movement->type->description }}</td>
                                        <td>{{ $movement->date->format('d/m/Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" align="center">Não há registros</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="pull-left">
                        <a href="{{ route('movements.insert') }}" class="btn btn-primary">Inserir Registro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

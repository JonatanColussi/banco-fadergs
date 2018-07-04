@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Extrato - {{ str_pad($account->id, 4, '0', STR_PAD_LEFT) }} - {{ $account->agency->name }} - {{ $account->client->name }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <th>Tipo de Movimentação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($account->movements as $movement)
                                    <tr>
                                        <td>{{ $movement->date->format('d/m/Y') }}</td>
                                        <td>R$ {{ number_format($movement->value*($movement->type->type == 'D' ? -1 : 1), 2, ',', '.') }}</td>
                                        <td>{{ $movement->type->description }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" align="center">Não há registros</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Saldo atual da Conta:</td>
                                    <td>R$ {{ number_format($account->limit, 2, ',', '.') }}</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Contas</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Conta</th>
                                    <th>Agência</th>
                                    <th>Cliente</th>
                                    <th>Limite (Saldo)</th>
                                    <th>Data Abertura</th>
                                    <th>Tipo de Conta</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($accounts as $account)
                                    <tr>
                                        <td>{{ str_pad($account->id, 4, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $account->agency->name }}</td>
                                        <td>{{ $account->client->name }}</td>
                                        <td>R$ {{ number_format($account->limit, 2, ',', '.') }}</td>
                                        <td>{{ $account->start_date->format('d/m/Y') }}</td>
                                        <td>{{ $account->accountType->description }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('accounts.edit', ['account_id' => $account->id]) }}"> Editar</a>
                                            <a class="btn btn-success" href="{{ route('movements.extract', ['account_id' => $account->id]) }}"> Extrato</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" align="center">Não há registros</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="pull-left">
                        <a href="{{ route('accounts.insert') }}" class="btn btn-primary">Inserir Registro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

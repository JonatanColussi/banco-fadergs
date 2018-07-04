@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Clientes</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Documento</th>
                                    <th>Pessoa</th>
                                    <th>Cidade</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($clients as $client)
                                    <tr>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->document }}</td>
                                        <td>{{ $client->person }}</td>
                                        <td>{{ $client->city }}</td>
                                        <td>{{ $client->status ? 'Ativo' : 'Inativo' }}</td>
                                        <td><a class="btn btn-info" href="{{ route('clients.edit', ['client_id' => $client->id]) }}"> Editar</a></td>
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
                        <a href="{{ route('clients.insert') }}" class="btn btn-primary">Inserir Registro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Conta</div>
                <div class="card-body">
                    <form action="{{ route('accounts.save') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="start_date">Conta</label>
                            <input type="integer" readonly class="form-control" value="{{ str_pad($account->id, 4, '0', STR_PAD_LEFT) }}">
                        </div>
                        <div class="form-group">
                            <label for="agency_id">Agência</label>
                            <select name="agency_id" required class="form-control">
                                <option value="">Escolha...</option>
                                @foreach($agencies as $agency)
                                    <option value="{{ $agency->id }}" {{ ($agency->id == $account->agency_id) ? 'selected' : '' }}>{{ $agency->name.' - '.$agency->city }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="client_id">Cliente</label>
                            <select name="client_id" required class="form-control">
                                <option value="">Escolha...</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ ($client->id == $account->client_id) ? 'selected' : '' }}>{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="limit">Limite (Saldo)</label>
                            <input type="number" required name="limit" step="0.01" placeholder="Limite (Saldo)" class="form-control" value="{{ $account->limit }}">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Data de Abertura</label>
                            <input type="date" required name="start_date" placeholder="Data de Abertura" class="form-control" value="{{ $account->start_date->format('Y-m-d') }}">
                        </div>
                        <div class="form-group">
                            <label for="account_type_id">Tipo de Conta</label>
                            <select name="account_type_id" required class="form-control">
                                <option value="">Escolha...</option>
                                @foreach($account_types as $account_type)
                                    <option value="{{ $account_type->id }}" {{ ($account_type->id == $account->account_type_id) ? 'selected' : '' }}>{{ $account_type->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="pull-left">
                            <input type="hidden" name="id" value="{{ $account->id }}">
                            <button type="submit" class="btn btn-primary">Salvar Registro</button>
                            <a href="{{ route('accounts.index') }}" class="btn btn-link">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

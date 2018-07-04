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
                <div class="card-header">Movimentação</div>
                <div class="card-body">
                    <form action="{{ route('movements.save') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="account_id">Conta</label>
                            <select name="account_id" required class="form-control">
                                <option value="">Escolha...</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">{{ str_pad($account->id, 4, '0', STR_PAD_LEFT).' | '.$account->client->name.' | '.$account->agency->name }}{{ (!$account->client->status) ? ' | [CLIENTE INATIVO]' : '' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="movement_type_id">Tipo de Movimentação</label>
                            <select name="movement_type_id" required class="form-control">
                                <option value="">Escolha...</option>
                                @foreach($movement_types as $movement_type)
                                    <option value="{{ $movement_type->id }}">{{ $movement_type->description }} | {{ ($movement_type->type == 'C') ? 'Crédito' : 'Débito'}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="value">Valor</label>
                            <input type="number" min="0" step="0.01" required name="value" placeholder="Valor" class="form-control">
                        </div>
                        <div class="pull-left">
                            <button type="submit" class="btn btn-primary">Salvar Registro</button>
                            <a href="{{ route('movements.index') }}" class="btn btn-link">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

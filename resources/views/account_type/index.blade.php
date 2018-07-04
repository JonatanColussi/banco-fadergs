@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tipos de Conta</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th>Classe</th>
                                    <th width="16%">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($account_types as $account_type)
                                    <tr>
                                        <td>{{ $account_type->description }}</td>
                                        <td>{{ $account_type->class}}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('account_types.edit', ['account_type_id' => $account_type->id]) }}"> Editar</a>
                                            <form style="display: inline-block;" action="{{ route('account_types.delete', ['account_type_id' => $account_type->id]) }}" method="post">
                                                {!! method_field('delete') !!}
                                                {!! csrf_field() !!}
                                                <button class="btn btn-danger" type="submit">Deletar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" align="center">Não há registros</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="pull-left">
                        <a href="{{ route('account_types.insert') }}" class="btn btn-primary">Inserir Registro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

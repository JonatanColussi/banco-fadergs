@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tipos de Movimento</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th>Tipo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($movement_types as $movement_type)
                                    <tr>
                                        <td>{{ $movement_type->description }}</td>
                                        <td>{{ ($movement_type->type == 'D') ? 'Débito' : 'Crédito' }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('movement_types.edit', ['movement_type_id' => $movement_type->id]) }}"> Editar</a>
                                            <form style="display: inline-block;" action="{{ route('movement_types.delete', ['movement_type_id' => $movement_type->id]) }}" method="post">
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
                        <a href="{{ route('movement_types.insert') }}" class="btn btn-primary">Inserir Registro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

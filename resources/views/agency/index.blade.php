@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Agências</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Cidade</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($agencies as $agency)
                                    <tr>
                                        <td>{{ $agency->name }}</td>
                                        <td>{{ $agency->city }}</td>
                                        <td><a class="btn btn-info" href="{{ route('agencies.edit', ['agency_id' => $agency->id]) }}"> Editar</a></td>
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
                        <a href="{{ route('agencies.insert') }}" class="btn btn-primary">Inserir Registro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
                <div class="card-header">Tipos de Movimento</div>
                <div class="card-body">
                    <form action="{{ route('movement_types.save') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="type">Tipo</label>
                            <select name="type" required class="form-control">
                                <option value="">Escolha...</option>
                                <option value="D" {{ ($movement_type->type == 'D') ? 'selected' : '' }}>Débito</option>
                                <option value="C" {{ ($movement_type->type == 'C') ? 'selected' : '' }}>Crédito</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <input type="text" required name="description" placeholder="Descrição" class="form-control" value="{{ $movement_type->description }}">
                        </div>
                        <div class="pull-left">
                            <input type="hidden" name="id" value="{{ $movement_type->id }}">
                            <button type="submit" class="btn btn-primary">Salvar Registro</button>
                            <a href="{{ route('movement_types.index') }}" class="btn btn-link">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

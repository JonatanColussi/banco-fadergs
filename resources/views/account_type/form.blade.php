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
                <div class="card-header">Tipos de Conta</div>
                <div class="card-body">
                    <form action="{{ route('account_types.save') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="class">Classe</label>
                            <select name="class" required class="form-control">
                                <option value="">Escolha...</option>
                                <option value="C" {{ ($account_type->class == 'C') ? 'selected' : '' }}>C</option>
                                <option value="P" {{ ($account_type->class == 'P') ? 'selected' : '' }}>P</option>
                                <option value="A" {{ ($account_type->class == 'A') ? 'selected' : '' }}>A</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <input required type="text" name="description" placeholder="Descrição" class="form-control" value="{{ $account_type->description }}">
                        </div>
                        <div class="pull-left">
                            <input type="hidden" name="id" value="{{ $account_type->id }}">
                            <button type="submit" class="btn btn-primary">Salvar Registro</button>
                            <a href="{{ route('account_types.index') }}" class="btn btn-link">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

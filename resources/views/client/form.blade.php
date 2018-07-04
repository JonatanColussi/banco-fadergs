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
            @if (session('errors'))
                <div class="alert alert-danger" role="alert">
                    {{ implode('', $errors->all(':message')) }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Cliente</div>
                <div class="card-body">
                    <form action="{{ route('clients.save') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" name="name" required placeholder="Nome" class="form-control" value="{{ $client->name }}">
                        </div>
                        <div class="form-group">
                            <label for="document">Documento</label>
                            <input type="text" name="document" required placeholder="Documento" class="cpfCnpj form-control" value="{{ $client->document }}">
                        </div>
                        <div class="form-group">
                            <label for="city">Cidade</label>
                            <input type="text" name="city" required placeholder="Cidade" class="form-control" value="{{ $client->city}}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" required class="form-control">
                                <option value="1" {{ $client->status ? 'selected' : '' }}>Ativo</option>
                                <option value="0" {{ !$client->status ? 'selected' : '' }}>Inativo</option>
                            </select>
                        </div>
                        <div class="pull-left">
                            <input type="hidden" name="id" value="{{ $client->id }}">
                            <input type="hidden" name="person" value="{{ $client->person }}">
                            <button type="submit" class="btn btn-primary">Salvar Registro</button>
                            <a href="{{ route('clients.index') }}" class="btn btn-link">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

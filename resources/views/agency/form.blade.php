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
                <div class="card-header">Agências</div>
                <div class="card-body">
                    <form action="{{ route('agencies.save') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" required name="name" placeholder="Nome" class="form-control" value="{{ $agency->name }}">
                        </div>
                        <div class="form-group">
                            <label for="city">Cidade</label>
                            <input type="text" required name="city" placeholder="Cidade" class="form-control" value="{{ $agency->city}}">
                        </div>
                        <div class="pull-left">
                            <input type="hidden" name="id" value="{{ $agency->id }}">
                            <button type="submit" class="btn btn-primary">Salvar Registro</button>
                            <a href="{{ route('agencies.index') }}" class="btn btn-link">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> <b>{{$funcionario->nome}}</b> -- {{ $funcionario->cpf }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <label for="nome">Nome</label>
                    <input id="nome" disabled value="{{ $funcionario->nome }}" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="cpf">CPF</label>
                    <input id="cpf" disabled value="{{ $funcionario->cpf }}" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="carteira_trabalho">CTPS</label>
                    <input id="carteira_trabalho" disabled value="{{ $funcionario->carteira_trabalho }}" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="setor">Setor</label>
                    <input id="setor" disabled value="{{ $funcionario->setor->setor }}" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="setor">Telefone(s)</label>
                   <ol>
                       @foreach($funcionario->telefones as $telefone)
                           <li>{{ $telefone }}</li>
                       @endforeach
                   </ol>
                </div>
            </div>
            <div class="row">
                <form action="{{ route('funcionarios.destroy', ['funcionario' => $funcionario->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mr-3">Excluir</button>
                </form>
                <a href="{{ route('funcionarios.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
@endsection

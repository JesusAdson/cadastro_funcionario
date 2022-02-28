@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Funcionários Cadastrados</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-blue">
              <div class="inner">
                <h3>{{ $data[0] }}</h3>
                <p>Vendas</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-money-bill"></i>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{ $data[1] }}</h3>
                <p>Escritório</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-desktop"></i>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>{{ $data[2] }}</h3>
                <p>Estoque</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-box"></i>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="small-box bg-orange">
              <div class="inner">
                <h3>{{ $data[3] }}</h3>
                <p>Administrativo</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-folder"></i>
              </div>
            </div>
          </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('funcionarios.create') }}" title="Novo Funcionário" class="btn btn-info">Novo <i class="fas fa-solid fa-plus"></i></a>
        </div>
    </div>
@stop

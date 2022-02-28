@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Funcionários</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        @include('funcionarios.includes.alerts')
        Filtros <i class="fas fa-solid fa-filter"></i>
    </div>
    <div class="card-body">
      <form action="{{ route('funcionarios.filtros') }}" method="POST">
          @csrf
          <div class="row">
              <div class="col-md-3">
                  <label for="fNome">Nome</label>
                  <input id="fNome" name="nome" class="form-control">
              </div>
              <div class="col-md-3">
                  <label for="fCPF">CPF</label>
                  <input id="fCPF" name="cpf" class="form-control">
              </div>
          </div>
          <div class="row mt-3">
              <div class="col-md-2">
                  <button class="btn btn-sm btn-info">Pesquisar <i class="fas fa-sm fa-search"></i></button>
              </div>
          </div>
      </form>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
        Novo <a href="{{ route('funcionarios.create') }}" title="Novo Funcionário" class="btn btn-sm btn-info"><i class="fas fa-solid fa-plus"></i></a>
    </div>
    <div class="card-body">
        @include('funcionarios.includes.table', ['funcionarios' => $funcionarios])
    </div>
      <div class="card-footer">
          @if(isset($filtros))
              {{ $funcionarios->appends($filtros)->links() }}
          @else
              {!!$funcionarios->links()!!}
          @endif
      </div>
  </div>
@endsection

@section('css')
@stop

@section('js')
    <script>
        const modalDelete = (id) => {
            let get_data = document.getElementById('delete');
            let data = JSON.parse(get_data.getAttribute('data-info'));
            let func = data.find(func => func.id === id);
            let span = document.getElementById('funcName');
            let form = document.getElementById('formDelete');
            span.innerHTML = func.nome;
            form.setAttribute('action', `/dashboard/funcionarios/${func.id}`);
        }
    </script>
@stop

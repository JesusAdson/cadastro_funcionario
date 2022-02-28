@extends('adminlte::page')

@section('title', 'Cadastrar Funcionário')

@section('content_header')
    <h1>Cadastrar Funcionário</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Cadastro de funcionário
            @include('funcionarios.includes.alerts')
        </div>
        <div class="card-body">
            <form action="{{ route('funcionarios.store') }}" method="POST">
                @csrf
                @include('funcionarios._partials._form')
                <div class="row mt-2 ml-0">
                    <button class="btn btn-success">Salvar</button>
                    <a href="{{ route('funcionarios.index') }}" class="btn btn-info ml-4">Voltar</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('css')
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script type="text/javascript">
        $(document).ready(($) => {
            $('#cpf').mask('000.000.000-00', {
                reverse: true
            });
        });

        const mask = (o, f) => {
            setTimeout(function() {
                var v = mphone(o.value);
                if (v != o.value) {
                    o.value = v;
                }
            }, 1);
        }

        const mphone = (v) => {
            var r = v.replace(/\D/g, "");
            r = r.replace(/^0/, "");
            if (r.length > 10) {
                r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
            } else if (r.length > 5) {
                r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
            } else if (r.length > 2) {
                r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
            } else {
                r = r.replace(/^(\d*)/, "($1");
            }
            return r;
        }


        let id = 1;
        const promiseInput = () => {
            return new Promise((resolve, reject) => {
                let container = document.getElementById('here');
                let input = document.createElement("input");
                input.type = "text";
                input.id = `telefone${id}`;
                input.className = "form-control mt-2";
                input.placeholder = "Somente números";
                input.name = "telefone[]";
                resolve(container.appendChild(input));
            });
        }

        const addInput = () => {
            promiseInput().then( () => {
                setTimeout(() => {
                    let input = document.getElementById(`telefone${id}`)
                    input.addEventListener('keypress', () => {
                       mask(input, mphone)
                    });
                    id++;
                }, 1000);
            });
        }
    </script>
@stop

<div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">CPF</th>
            <th scope="col">Nome</th>
            <th scope="col">Setor</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
            @foreach($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->id }}</td>
                    <td>{{ $funcionario->cpf }}</td>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->setor->setor }}</td>
                    <td class="text-rigth">
                        <a href="{{ route('funcionarios.show', ['funcionario' => $funcionario->id]) }}" class="btn btn-sm btn-warning"> <i class="fas fa-eye"></i></a>
                        <a href="{{ route('funcionarios.edit', ['funcionario' => $funcionario->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-sm btn-danger" id="delete" onclick="modalDelete({{ $funcionario->id }})" data-toggle="modal" data-target="#modalDeleta" data-info="{{ json_encode($funcionarios) }}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('funcionarios.includes.modal_delete')
</div>

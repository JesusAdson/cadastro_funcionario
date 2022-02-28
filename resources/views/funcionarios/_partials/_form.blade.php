<div>
    <div class="row">
        <div class="col-md-5">
            <label for="nome">Nome Completo</label>
            <input type="text" name="nome" class="form-control" value="{{ $funcionario->nome ?? old('nome') }}" placeholder="">
        </div>
        <div class="col-md-3">
            <label for="cpf">CPF</label>
            <input type="text" id="cpf" name="cpf" class="form-control" value="{{ $funcionario->cpf ?? old('cpf') }}" placeholder="Somente números">
        </div>
        <div class="col-md-4">
            <label for="carteira_trabalho">Carteira de Trabalho</label>
            <input type="text" name="carteira_trabalho" class="form-control" value="{{ $funcionario->carteira_trabalho ?? old('carteira_trabalho') }}" placeholder="Somente números">
        </div>
      </div>
      <div class="row">
          <div class="col-md-3 mt-2">
              <label for="setor">Setor</label>
              <select name="setor" id="setor" class="form-control">
                  <option value="" selected disabled>Selecione</option>
                  @foreach($setores as $setor)
                      <option value="{{ $setor->id }}"{{ ($funcionario->setor_id ?? old('setor')) == $setor->id ? 'selected' : '' }}>{{ $setor->setor }}</option>
                  @endforeach
              </select>
          </div>
            @if(isset($funcionario->telefones))
              <div class="col-md-4" id="">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Telefone(s)</th>
                            <th> - </th>
                            <th>
                                <a href="#" id="link" onclick="addInput()">
                                    <i class="fas fa-plus fa-sm"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($funcionario->telefones as $index => $telefone)
                            <tr id="{{ $index }}">
                                <td><input type="text"  onkeypress="mask(this, mphone)"  id="val{{ $index }}" name="telefone[]" class="form-control mt-1" value="{{ $telefone }}"></td>
                                <td><a href="#" class="btb btn-sm btn-danger" onclick="remove({{ $index }})"><i class="fas fa-sm fa-minus"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
              <div class="col-md-3 mt-2 hidden" id="here">
                  <label for="addTel" type="">Adicionar Telefone</label>

              </div>
              @else
                <div class="col-md-4 mt-2" id="here">
                    <label for="tel">Telefone(s)
                        <a href="#" id="link" onclick="addInput()">
                            <i class="fas fa-plus fa-sm"></i>
                        </a>
                    </label>
                    <input type="text" id="tel" onkeypress="mask(this, mphone)"  name="telefone[]" class="form-control" value="{{ $funcionario->telefones ?? old('telefone[]') }}" placeholder="Somente números">
                </div>
            @endif
      </div>
</div>

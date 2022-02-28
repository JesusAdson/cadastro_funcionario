<?php

   namespace App\Services;

   use App\Http\Requests\FuncionarioUpdateOrCreate;
   use App\Models\Funcionario;
   use Illuminate\Http\Request;

   class FuncionarioService
   {
       private $funcionario;

       public function __construct(Funcionario $funcionario)
        {
            $this->funcionario = $funcionario;
        }

        public function getAllPaginated()
        {
            $user_id = auth()->user()->id;
            return Funcionario::query()->where('user_id', $user_id)->with('setor')->latest()->paginate();
        }
        public function create(FuncionarioUpdateOrCreate $request)
        {
            $telefones = [];

            foreach ($request->telefone as $telefone)
            {
                if(!is_null($telefone))
                {
                    array_push($telefones, $telefone);
                }
            }

            $user_id = auth()->user()->id;

            return Funcionario::query()->create([
                "user_id"           => $user_id,
                "nome"              => $request->nome,
                "cpf"               => $request->cpf,
                "carteira_trabalho" => $request->carteira_trabalho,
                "setor_id"          => $request->setor,
                "telefones"          =>serialize($telefones)
            ]);
        }

        public function update(FuncionarioUpdateOrCreate $request, $id)
        {
            $telefones = [];

            foreach ($request->telefone as $telefone)
            {
                if(!is_null($telefone))
                {
                    array_push($telefones, $telefone);
                }
            }
            $user_id = auth()->user()->id;
            $funcionario = Funcionario::query()->findOrFail($id);

            if(!$funcionario)
            {
                return redirect()->back('funcionario.index')->with('errors', 'Não foi possível editar. Funcionário não encontrado.');
            }

            $funcionario->update([
                "user_id"           => $user_id,
                "nome"              => $request->nome,
                "cpf"               => $request->cpf,
                "carteira_trabalho" => $request->carteira_trabalho,
                "setor_id"          => $request->setor,
                "telefones"          =>serialize($telefones)
            ]);

            return $funcionario;

        }

        public function delete($id)
        {
            $funcionario = Funcionario::query()->findOrFail($id);
            if(!$funcionario) return redirect()->back()->with('errors', 'Não foi possível deletar. Funcionário não encontrado.');

            return $funcionario->delete();
        }

        public function filtrar(Request $request)
        {
            $user_id = auth()->user()->id;
            $funcionario = Funcionario::query()
                ->where('user_id', $user_id)
                ->with('setor')
                ->when(isset($request->nome), function($query) use($request){
                    return $query->where('nome', 'LIKE', "{$request->nome}%");
                })
                ->when(isset($request->cpf), function($query) use($request){
                    return $query->where('cpf', $request->cpf);
                })
                ->paginate(1);

            if(!$funcionario) return redirect()->back()->with('error', 'Funcionário não encontrado.');

            return $funcionario;
        }
   }

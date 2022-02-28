<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioUpdateOrCreate;
use App\Models\Funcionario;
use App\Models\Setor;
use App\Services\FuncionarioService;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    private $funcionario_service;

    public function __construct(FuncionarioService $funcionario_service)
    {
        $this->middleware('auth');
        $this->funcionario_service = $funcionario_service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = $this->funcionario_service->getAllPaginated();
        return view('funcionarios.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     **/
    public function create()
    {
        $setores = Setor::all();
        return view('funcionarios.create', compact('setores'));
    }

    /**
     *
     * Store a newly created resource in storage.
     * @param FuncionarioUpdateOrCreate $request
     *
     */
    public function store(FuncionarioUpdateOrCreate $request)
    {
        $this->funcionario_service->create($request);
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     */
    public function show($id)
    {
        $funcionario = Funcionario::query()->with('setor')->findOrFail($id);
        $funcionario->telefones = unserialize($funcionario->telefones);

        if(!$funcionario) return redirect()->back()->with('errors', 'Funcionário não econtrado.');

        return view('funcionarios.show', compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     */
    public function edit($id)
    {
        $funcionario = Funcionario::query()->with('setor')->findOrFail($id);
        $funcionario->telefones = unserialize($funcionario->telefones);
        $setores = Setor::all();

        return view('funcionarios.edit', compact('funcionario', 'setores'));
    }

    /**
     * Update the specified resource in storage.
     * @param  int  $id
     */
    public function update(FuncionarioUpdateOrCreate $request, $id)
    {
        $this->funcionario_service->update($request, $id);

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     */
    public function destroy($id)
    {
        $this->funcionario_service->delete($id);

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário deletado com sucesso.');
    }

    /**
     * Search for an employee by a filter.
     * @param Request $request
     */
    public function filtrar(Request $request)
    {
        $funcionarios = $this->funcionario_service->filtrar($request);
        $filtros = $request->except('_token');
        return view('funcionarios.index', compact('funcionarios', 'filtros'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user_id = auth()->user()->id;

        $funcionarios = Funcionario::query()->where('user_id', $user_id)->get();

        $data = $this->countBySector($funcionarios);

        return view('dashboard', compact('data'));
    }

    private function countBySector($funcionarios)
    {
        $venda = 0;
        $escritorio = 0;
        $estoque = 0;
        $administrativo= 0;
        
        foreach($funcionarios as $funcionario)
        {
            switch($funcionario->setor_id)
            {
                case 1:
                    $venda += 1;
                    break;
                case 2:
                    $escritorio +=1;
                    break;
                case 3:
                    $estoque +=1;
                    break;
                case 4:
                    $administrativo += 1;
                    break;
            }
        }

        return [$venda, $escritorio, $estoque, $administrativo];
    }
}

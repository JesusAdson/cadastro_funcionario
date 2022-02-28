<?php

namespace Database\Seeders;

use App\Models\Setor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setores = ['Vendas', 'Escritório', 'Estoque', 'Administrativo'];

        foreach($setores as $setor){
            Setor::query()->create([
                'setor' => $setor
            ]);
        }
    }
}

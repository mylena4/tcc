<?php

use Illuminate\Database\Seeder;
use App\Produto;
use App\Produto_Material;


class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create([
            'nome' => 'Caneta com Flor',
            'descricao' => 'Caneta com flor na ponta',
            'preco' => 15, 
        ]);
        
        Produto_Material::create([
            'prod_id' => 4,
            'mate_id' => 1,
            'qtd_mate' => 0.5,
        ]);
        
        
    }
}

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
        //Produto 1
        Produto::create([
            'nome' => 'Caneta com Flor',
            'descricao' => 'Caneta com flor na ponta',
            'preco' => 15, 
        ]);
        
        Produto_Material::create([
            'prod_id' => 1,
            'mate_id' => 1,
            'qtd_mate' => 1,
        ]);
        
        Produto_Material::create([
            'prod_id' => 1,
            'mate_id' => 2,
            'qtd_mate' => 1,
        ]);
        
        Produto_Material::create([
            'prod_id' => 1,
            'mate_id' => 3,
            'qtd_mate' => 0.01,
        ]);
        
        Produto_Material::create([
            'prod_id' => 1,
            'mate_id' => 4,
            'qtd_mate' => 0.05,
        ]);
        
        Produto_Material::create([
            'prod_id' => 1,
            'mate_id' => 8,
            'qtd_mate' => 0.3,
        ]);
        
        Produto_Material::create([
            'prod_id' => 1,
            'mate_id' => 9,
            'qtd_mate' => 0.05,
        ]);
        
        //Produto 2
        Produto::create([
            'nome' => 'Arranjo',
            'descricao' => 'Arranjo com 8 flores.',
            'preco' => 50, 
        ]);
        
        Produto_Material::create([
            'prod_id' => 2,
            'mate_id' => 1,
            'qtd_mate' => 1.5,
        ]);
        
        //Produto 3
        Produto::create([
            'nome' => 'Porta Pano de Prato',
            'descricao' => 'Caneta com flor na ponta',
            'preco' => 15, 
        ]);
        
        Produto_Material::create([
            'prod_id' => 3,
            'mate_id' => 1,
            'qtd_mate' => 0.5,
        ]);
        
        //Produto 4
        Produto::create([
            'nome' => 'Garrafa Decorada',
            'descricao' => 'Garrafa decorada com flores.',
            'preco' => 20, 
        ]);
        
        Produto_Material::create([
            'prod_id' => 4,
            'mate_id' => 1,
            'qtd_mate' => 0.5,
        ]);
        
        
    }
}

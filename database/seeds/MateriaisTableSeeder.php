<?php

use Illuminate\Database\Seeder;
use App\Estoque;

class MateriaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Estoque::create([
            'forn_id' => 6,
            'nome' => 'EVA',
            'descricao'=> 'Placa emborrachada cores variadas.',
            'quantidade' => 500,
            'preco' => 1.00,
        ]);
        
        Estoque::create([
            'forn_id' => 2,
            'nome' => 'Caneta',
            'descricao'=> 'Caneta BIC cor azul.',
            'quantidade' => 100,
            'preco' => 0.50,
        ]);
        
        Estoque::create([
            'forn_id' => 3,
            'nome' => 'Cola Instântanea',
            'descricao'=> 'Cola instântanea para artesanato.',
            'quantidade' => 15,
            'preco' => 15.00,
        ]);
        
        Estoque::create([
            'forn_id' => 4,
            'nome' => 'Fita Cetim',
            'descricao'=> 'Tecido de seda lustroso e macio cuja trama não aparece no lado avesso',
            'quantidade' => 10,
            'preco' => 4.00,
        ]);
        
        Estoque::create([
            'forn_id' => 6,
            'nome' => 'Vaso Madeira',
            'descricao'=> 'Vaso de Madeira cores variadas.',
            'quantidade' => 1,
            'preco' => 5.00,
        ]);
        
        Estoque::create([
            'forn_id' => 7,
            'nome' => 'Vaso Metal',
            'descricao'=> 'Vaso de Metal cores variadas.',
            'quantidade' => 1,
            'preco' => 7.00,
        ]);
        
        Estoque::create([
            'forn_id' => 8,
            'nome' => 'Vaso Vidro',
            'descricao'=> 'Vaso de vidro transparente.',
            'quantidade' => 1,
            'preco' => 10.00,
        ]);
        
        Estoque::create([
            'forn_id' => 9,
            'nome' => 'Cola para Tecido',
            'descricao'=> 'Cola para artesanatos em geral.',
            'quantidade' => 1,
            'preco' => 5.00,
        ]);
        
        Estoque::create([
            'forn_id' => 9,
            'nome' => 'Tinta para Tecido',
            'descricao'=> 'Tinta para tecido, cores variadas.',
            'quantidade' => 1,
            'preco' => 3.00,
        ]);
        
        Estoque::create([
            'forn_id' => 9,
            'nome' => 'Arame',
            'descricao'=> 'Arame metal.',
            'quantidade' => 1,
            'preco' => 10.00,
        ]);
        
    }
}

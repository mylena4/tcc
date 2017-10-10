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
            'descricao'=> 'Placa emborrachada',
            'quantidade' => 1,
            'preco' => 1.00,
        ]);
        
        Estoque::create([
            'forn_id' => 2,
            'nome' => 'CANETA',
            'descricao'=> 'Pequeno tubo em que se coloca lapis ou pena para escrever',
            'quantidade' => 1,
            'preco' => 0.50,
        ]);
        
        Estoque::create([
            'forn_id' => 3,
            'nome' => 'COLA',
            'descricao'=> 'Substancia glutinosa e tenaz extraida de diferentes materias',
            'quantidade' => 1,
            'preco' => 15.00,
        ]);
        
        Estoque::create([
            'forn_id' => 4,
            'nome' => 'FITA CETIM',
            'descricao'=> 'Tecido de seda lustroso e macio cuja trama não aparece no lado avesso',
            'quantidade' => 1,
            'preco' => 4.00,
        ]);
        
        Estoque::create([
            'forn_id' => 6,
            'nome' => 'VASO',
            'descricao'=> 'Recipiente Concavo de varios formatos, proprio para conter liquidos ou solidos',
            'quantidade' => 1,
            'preco' => 3.00,
        ]);
        
        Estoque::create([
            'forn_id' => 7,
            'nome' => 'PALITO DE CHURRASCO',
            'descricao'=> 'Haste de madeira de até 30cm utilzado em churrascos para fazer espetinhos',
            'quantidade' => 1,
            'preco' => 10.00,
        ]);
        
        Estoque::create([
            'forn_id' => 8,
            'nome' => 'CARTOLINA',
            'descricao'=> 'Cartão de espessura mediana, entre o papel grosso e o papelão.',
            'quantidade' => 1,
            'preco' => 3.40,
        ]);
        
        Estoque::create([
            'forn_id' => 9,
            'nome' => 'FITA CETIM',
            'descricao'=> 'Tecido de seda lustroso e macio cuja trama não aparece no lado avesso',
            'quantidade' => 1,
            'preco' => 2.00,
        ]);
        
    }
}

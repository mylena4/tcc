<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
class FornecedoresTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Fornecedor::create([
        'nome' => 'Paper n craft papelaria',
        'endereco' => 'Rua 25 de maio, 44',
        'cnpj' => 1234567891234,
        'telefone' => 1132318769 ,
        ]);
        
        Fornecedor::create([
        'nome' => 'Bolsas e artigos de couro em geral',
        'endereco' => 'Rua 25 de maio, 57',
        'cnpj' => 1234567891233,
        'telefone' => 1132318777 ,
        ]);
        
        Fornecedor::create([
        'nome' => 'Madeiraria Carlo',
        'endereco' => 'Rua 13 de setembro, 77',
        'cnpj' => 1234567891235,
        'telefone' => 1132317755 ,
        ]);
        
        Fornecedor::create([
        'nome' => 'Art e Tintas',
        'endereco' => 'Travessa dos carneiros, 22',
        'cnpj' => 1234567891237,
        'telefone' => 1132312211 ,
        ]);
        
        Fornecedor::create([
        'nome' => 'Mansão dos presentes LTDA',
        'endereco' => 'Rua General Afonso Tavares, 21',
        'cnpj' => 1234567891231,
        'telefone' => 11323172344 ,
        ]);
        
        Fornecedor::create([
        'nome' => 'A casa do EVA',
        'endereco' => 'Alameda Pio XXIV, 24',
        'cnpj' => 1234567891222,
        'telefone' => 1132318700 ,
        ]);
        
        Fornecedor::create([
        'nome' => 'Armarinho Fernando',
        'endereco' => 'Rua 25 de marco, 277',
        'cnpj' => 1234567891222,
        'telefone' => 1132312222 ,
        ]);
        
        Fornecedor::create([
        'nome' => 'Paper Magic papelaria LTDA',
        'endereco' => 'Rua Paulo Filho, 221',
        'cnpj' => 1234567891221,
        'telefone' => 1132314242 ,
        ]);
        
        Fornecedor::create([
        'nome' => 'A guilda do artesao',
        'endereco' => 'Rua Salgado Fachini, 2312',
        'cnpj' => 1234567890000,
        'telefone' => 1132318888 ,
        ]);
      
    }
}

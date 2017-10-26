<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'nome' => 'Regina',
            'telefone' => 11958745856,
            'endereco' => 'Rua dos Bobos, 0',
            'email' => 'regina@email.com',
         
        ]);
        
        Cliente::create([
            'nome' => 'Fernando',
            'telefone' => 11982540225,
            'endereco' => 'Travessa Diagonal, 52',
            'email' => 'fernando@gmail.com',
        ]);
        
        Cliente::create([
            'nome' => 'Guilherme',
            'telefone' => 11952744589,
            'endereco' => 'Vila Boin, 52',
            'email' => 'guilherme@uol.com',
        ]);
        
        Cliente::create([
            'nome' => 'Tatiana',
            'telefone' => 11945272839,
            'endereco' => 'Rua dos alfeneiros, 47',
            'email' => 'tatiana@danone.com',
        ]);
        
        Cliente::create([
            'nome' => 'Antonio',
            'telefone' => 11975222758,
            'endereco' => 'Rua do Catombo, 75',
            'email' => 'antonio@bol.com',
        ]);
        
        Cliente::create([
            'nome' => 'Zefiro',
            'telefone' => 11985748958,
            'endereco' => 'Travessa de prontera, 598',
            'email' => 'zefiro@ig.com',
        ]);
        
        Cliente::create([
            'nome' => 'Maya',
            'telefone' => 11974817589,
            'endereco' => 'Rua dos Mais, 770',
            'email' => 'maya@uol.com',
        ]);
        
        Cliente::create([
            'nome' => 'Reinheart',
            'telefone' => 1122578963,
            'endereco' => 'Praça dos omnicos, 785',
            'email' => 'reinheart@hotmail.com',
        ]);
        
        Cliente::create([
            'nome' => 'Ted',
            'telefone' => 1196858965,
            'endereco' => 'Alameda dos anjos, 4274',
            'email' => 'ted@hotmail.com',
        ]);
        
        Cliente::create([
            'nome' => 'William',
            'telefone' => 11977482148,
            'endereco' => 'Viela da alegria, 44',
            'email' => 'william@hotmail.com',
        ]);
        
        Cliente::create([
            'nome' => 'Roan',
            'telefone' => 11997853658,
            'endereco' => 'Avenida Carioca, 2224',
            'email' => 'roan@hotmail.com',
        ]);
        
    }
}
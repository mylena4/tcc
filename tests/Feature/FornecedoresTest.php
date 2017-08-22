<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Fornecedor;


use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FornecedoresTest extends TestCase
{
    
    use DatabaseMigrations;


    
    /** @test */
    public function usuarios_logados_podem_inserir_fornecedores_no_sistema()
    {
        $fornecedor = factory(Fornecedor::class)->make();
        
        $user = factory(User::class)->create();
        
        $this->actingAs($user);
        
        $response = $this->post('/fornecedores', $fornecedor->toArray());
        
        $this->assertDatabaseHas('fornecedores', ['nome' => $fornecedor->nome]);
     
        $response->assertStatus(200);
    }
    
        
    /** @test */
    public function usuarios_nao_logados_nao_podem_inserir_fornecedores_no_sistema()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        
        $fornecedor = factory(Fornecedor::class)->make();
        
        $this->post('/fornecedores', $fornecedor->toArray());

        $this->assertDatabaseMissing('fornecedores', ['nome' => $fornecedor->nome]);
    }
    
}

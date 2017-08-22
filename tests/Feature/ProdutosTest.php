<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProdutosTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function usuario_logado_pode_listar_todos_os_produtos_cadastrados()
    {
        $produto = factory('App\Estoque')->create();

        $user = factory('App\User')->create();
        
        $this->actingAs($user);

        $response = $this->get('/materiais');

        $response->assertSee($produto->nome);
        
        $response->assertSee($produto->descricao);
    }
    
    
    /** @test */
    public function usuario_nao_logado_nao_pode_listar_todos_os_produtos_cadastrados()
    {
        $this->withExceptionHandling();
        
        $produto = factory('App\Estoque')->create();

        $response = $this->get('/materiais');
        
        $response->assertRedirect('/login');
    }

}

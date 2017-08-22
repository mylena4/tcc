<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class UsuarioTest extends TestCase
{

    use DatabaseMigrations;



    /** @test */
    public function usuario_logado_pode_acessar_recursos_protegidos_por_middleware()
    {
        $user = factory(User::class)->create();
        
        $this->actingAs($user);
        
        $response = $this->get('/materiais');
        
        $response->assertStatus(200);
    }


    
    /** @test */
    public function usuario_nao_logado_nao_pode_acessar_recursos_protegidos_por_middleware()
    {
        $this->expectException(\Illuminate\Auth\AuthenticationException::class);
        
        $user = factory(User::class)->create();
                
        $response = $this->get('/materiais');
    }
}
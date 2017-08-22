<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Fornecedor;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FornecedorTest extends TestCase
{
    
    use DatabaseMigrations;
    
    /** @test */
    public function para_inserir_um_fornecedor_no_banco_de_dados_requer_se_um_nome()
    {
        $this->expectException('Illuminate\Validation\ValidationException');
        
        $fornecedor = factory('App\Fornecedor')->make(['nome' => null]);
        
        $user = factory('App\User')->create();
        
        $this->actingAs($user);
        
        $this->post('/fornecedores', $fornecedor->toArray());
        
    }
    
    
    /** @test */
    public function para_inserir_um_fornecedor_no_banco_de_dados_requer_se_um_endereco()
    {
        $this->expectException('Illuminate\Validation\ValidationException');
        
        $fornecedor = factory('App\Fornecedor')->make(['endereco' => null]);
        
        $user = factory('App\User')->create();
        
        $this->actingAs($user);
        
        $this->post('/fornecedores', $fornecedor->toArray());
        
    }
    
    
        
    /** @test */
    public function para_inserir_um_fornecedor_no_banco_de_dados_requer_se_um_cnpj()
    {
        $this->expectException('Illuminate\Validation\ValidationException');
        
        $fornecedor = factory('App\Fornecedor')->make(['cnpj' => null]);
        
        $user = factory('App\User')->create();
        
        $this->actingAs($user);
        
        $this->post('/fornecedores', $fornecedor->toArray());
        
    }
        
    
    
}

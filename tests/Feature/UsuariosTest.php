<?php


namespace Tests\Feature;

use Tests\TestCase;
use App\User;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsuariosTest extends TestCase
{
    use DatabaseMigrations;


    /** @test */
    public function usuario_admin_pode_cadastrar_novo_usuario()
    {

        $usernew = factory(User::class)->make();

        $user = factory(User::class)->create(['perfil' => 1]);

        $this->actingAs($user);

        $response = $this->post('/usuario', $usernew->toArray());

        $this->assertDatabaseHas('users', ['name' => $usernew->name]);

        $response->assertStatus(200);


    }

    /** @test */
    public function usuario_comum_nao_pode_cadastrar_novo_usuario()
    {

        $usernew = factory(User::class)->make();

        $user = factory(User::class)->create(['perfil' => 2 ]);

        $this->actingAs($user);

        $this->post('/usuario', $usernew->toArray());

        $this->assertDatabaseMissing('users', ['name' => $usernew->name]);

    }

    /** @test */
    /*public function usuario_admin_pode_desativar_usuario()
    {

        $user = factory(User::class)->create(['perfil' => 1]);

        $this->actingAs($user);

        $response->assertStatus(200);


    }*/

}

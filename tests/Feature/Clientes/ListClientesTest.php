<?php

namespace Tests\Feature\Clientes;

use App\Models\Cliente;
use Tests\TestCase;

class ListClientesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_lista_clientes()
    {
        $clientes = Cliente::factory()->count(3)->make();

        $response = $this->json('GET',route('clientes.index'));

        $response->assertStatus(200);
    }
}

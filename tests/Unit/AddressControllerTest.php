<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Models\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;


class AddressControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_exibe_enderecos_existentes()
    {
        Address::factory()->count(3)->create();

        $response = $this->get(route('address.index'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'street',
                    'neighborhood',
                    'city',
                    'uf',
                    'zip_code',
                ],
            ],
        ]);
    }

    public function test_captura_novo_endereco_da_api_externa()
    {
        $response = $this->get(route('address.index', ['address' => 'Rua Teste']));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'street',
                    'neighborhood',
                    'city',
                    'uf',
                    'zip_code',
                ],
            ],
        ]);
    }

    public function test_armazena_dados_validos()
    {
        $requestData = [
            'street' => 'Rua Teste',
            'neighborhood' => 'Bairro Teste',
            'city' => 'Cidade Teste',
            'uf' => 'SP',
            'zip_code' => '12345678',
        ];

        // Simule uma requisição POST para a rota do controller
        $response = $this->post(route('address.store'), $requestData);

        // Verifique se a resposta foi bem-sucedida (código HTTP 201)
        $response->assertStatus(201);

        // Verifique se o endereço foi criado no banco de dados
        $this->assertDatabaseHas('addresses', $requestData);
    }

    public function test_armazena_dados_invalidos()
    {
        $requestData = [];

        $response = $this->post(route('address.store'), $requestData);

        $response->assertStatus(302);
    }

    public function test_exibe_um_endereco_existente()
    {
        $address = Address::factory()->create();

        $response = $this->get(route('address.show', ['address' => $address->zip_code]));

        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'id' => $address->id,
                'street' => $address->street,
                'neighborhood' => $address->neighborhood,
                'city' => $address->city,
                'uf' => $address->uf,
                'zip_code' => $address->zip_code,
            ]
        ]);
    }

    public function test_exibe_um_endereco_nao_existente()
    {
        $response = $this->get(route('address.show', ['address' => '12345678']));

        $response->assertStatus(404);

        $response->assertJson([
            'message' => 'Cep não encontrado!',
        ]);
    }

    public function test_apaga_um_endereco_existente()
    {
        $address = Address::factory()->create();

        $response = $this->delete(route('address.destroy', ['address' => $address->id]));

        $response->assertStatus(200);

        $this->assertDatabaseMissing('addresses', ['id' => $address->id]);
    }

    public function test_apaga_um_endereco_nao_existente()
    {
        $response = $this->delete(route('address.destroy', ['address' => 123]));

        $response->assertStatus(404);

        $response->assertJson([
            'message' => 'Endereço não encontrado!',
        ]);
    }

    public function test_atualiza_um_endereco_existente()
    {
        $address = Address::factory()->create();

        $updateData = [
            'street' => 'Nova Rua',
            'city' => 'Nova Cidade',
        ];

        $response = $this->patch(route('address.update', ['address' => $address->id]), $updateData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('addresses', array_merge(['id' => $address->id], $updateData));
    }

    public function test_atualiza_um_endereco_nao_existente()
    {
        $updateData = [
            'street' => 'Nova Rua',
            'city' => 'Nova Cidade',
        ];

        $response = $this->patch(route('address.update', ['address' => 123]), $updateData);

        $response->assertStatus(500);

        $response->assertJson([
            'message' => 'Falha ao atualizar endereço.',
        ]);
    }
}

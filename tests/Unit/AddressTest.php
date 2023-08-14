<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddressTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function seta_cep_so_com_numeros()
    {
        $address = Address::make();
        $address->zip_code = '12345-678';

        $this->assertEquals('12345678', $address->zip_code);
    }

    /** @test */
    public function set_uf_em_caixa_alta()
    {
        $address = new Address();
        $address->uf = 'sp';

        $this->assertEquals('SP', $address->uf);
    }

    /** @test */
    public function filtra_endereco_por_nome_da_rua_ou_cep()
    {
        Address::factory()->create(['street' => 'Main St', 'zip_code' => '12345677']);
        Address::factory()->create(['street' => 'Second St', 'zip_code' => '12345679']);
        
        $filteredAddresses = Address::streetOrZipCode('Main')->get();

        $this->assertCount(1, $filteredAddresses);
        $this->assertEquals('Main St', $filteredAddresses->first()->street);

        $filteredAddresses = Address::streetOrZipCode('12345679')->get();

        $this->assertCount(1, $filteredAddresses);
        $this->assertEquals('Second St', $filteredAddresses->first()->street);
    }
}

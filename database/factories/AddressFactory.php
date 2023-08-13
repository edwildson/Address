<?php 

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition()
    {
        $this->withFaker();

        return [
            'street' => $this->faker->streetName,
            'neighborhood' => $this->faker->city,
            'city' => $this->faker->city,
            'uf' => $this->faker->stateAbbr,
            'zip_code' => $this->faker->regexify('[0-9]{8}'),
        ];
    }
}
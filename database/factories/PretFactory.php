<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pret>
 */
class PretFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bank = $this->faker->randomElement(["BOA", "BFV", "BNI", "BAOBAB", "Accès Banque", "BMOI"]);
        $taux = $this->faker->randomElement([10, 20, 30]);
        return [
            "numeroCompte" => $this->faker->uuid(),
            "nomClient" => $this->faker->name(),
            "nomBanque" => $bank,
            "montant" => $this->faker->randomFloat(2, 5000.00, 1000000.00),
            "taux_de_pret" => $taux,
            "date_de_pret" => $this->faker->dateTimeBetween('-12 months', 'now'),
            "totalPayer" => $this->faker->randomFloat(2, 40000.00, 1000000.00)
        ];
    }
}

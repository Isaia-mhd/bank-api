<?php

namespace Database\Seeders;

use App\Models\Pret;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PretSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pret::factory(50)->create();
    }
}

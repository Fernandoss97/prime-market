<?php

namespace Database\Seeders;

use App\Models\EstablishmentImages;
use Illuminate\Database\Seeder;

class EstablishmentImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstablishmentImages::factory()->count(30)->create();
    }
}

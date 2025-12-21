<?php

namespace Database\Seeders;

use App\Models\EstablishmentCategory;
use Illuminate\Database\Seeder;

class EstablishmentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstablishmentCategory::factory()->count(10)->create();
    }
}

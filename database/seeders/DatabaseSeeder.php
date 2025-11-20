<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create([
            'id' => 1,
            'name' => 'User 1',
            'email' => 'fernando@teste.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => null,
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
            'remember_token' => null,
        ]);
        Seller::factory(1)->create([
            'user_id' => User::first()->id,
            'store_name' => 'Seller user1 ',
        ]);
        Product::factory(15)->create([
            'seller_id' => Seller::first()->id,
        ]);

        $this->call([
            CategorySeeder::class,
            SellerSeeder::class,
            ProductSeeder::class,
        ]);
    }
}

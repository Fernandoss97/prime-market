<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $sellerRole = Role::create(['name' => 'seller']);
        $adminRole = Role::create(['name' => 'admin']);

        $user = User::factory()->create([
            'id' => 1,
            'name' => 'Fernando Teste',
            'email' => 'fernando@teste.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => null,
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
            'remember_token' => null,
        ]);

        $user->assignRole($sellerRole);
        $user->assignRole($adminRole);

        Seller::factory()->create([
            'user_id' => $user->id,
            'store_name' => 'Seller Fernando Teste',
        ]);

        Customer::factory()->create([
            'user_id' => $user->id,
            'phone' => '123-456-7890',
        ]);

        Product::factory(15)->create([
            'seller_id' => Seller::first()->id,
        ]);

        $this->call([
            CategorySeeder::class,
            SellerSeeder::class,
            ProductSeeder::class,
            CustomerSeeder::class,
            EstablishmentCategorySeeder::class,
            EstablishmentSeeder::class,
        ]);
    }
}

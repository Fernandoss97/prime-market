<?php

use App\Actions\Seller\CreateSeller;
use App\Models\Seller;
use App\Models\User;
use Spatie\Permission\Models\Role;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('User without seller role cannot access seller products', function () {

    /** @var User */
    $user = User::factory()->create();

    actingAs($user);

    $response = get('/seller/products');

    $response->assertStatus(403);
});

test('User with seller role can access seller products', function () {

    Role::create(['name' => 'seller']);

    /** @var Seller */
    $seller = CreateSeller::run([
        'name' => 'Seller User',
        'email' => 'seller@example.com',
        'password' => 'password',
        'store_name' => 'Seller Store',
        'document' => '12345678900',
    ]);

    actingAs($seller->user);

    $response = get('/seller/products');

    $response->assertStatus(200);
});

<?php

use App\Actions\Seller\CreateSeller;
use App\Models\Seller;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

use function Pest\Laravel\assertDatabaseHas;

beforeEach(function () {
    Role::create(['name' => 'seller']);
});

it('should create a seller', function () {
    $data = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password',
        'store_name' => 'John\'s Store',
        'document' => '12345678900',
    ];

    $seller = CreateSeller::run($data);

    $this->assertInstanceOf(Seller::class, $seller);

    assertDatabaseHas('users', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);

    assertDatabaseHas('sellers', [
        'user_id' => $seller->user_id,
        'store_name' => 'John\'s Store',
        'document' => '12345678900',
    ]);
});

test('name should be required', function () {
    expect(fn() => CreateSeller::run([
        'name' => '',
        'email' => 'abc',
    ]))->toThrow(
        ValidationException::class,
        __('validation.required', ['attribute' => 'name'])
    );
});

test('email should be unique', function () {
    CreateSeller::run([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password',
        'store_name' => 'John\'s Store',
        'document' => '12345678900',
    ]);

    expect(fn() => CreateSeller::run([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password',
        'store_name' => 'John\'s Store',
        'document' => '12345678900',
    ]))->toThrow(
        ValidationException::class,
        __('validation.unique', ['attribute' => 'email'])
    );
});

test('document should be unique', function () {
    CreateSeller::run([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password',
        'store_name' => 'John\'s Store',
        'document' => '12345678900',
    ]);

    expect(fn() => CreateSeller::run([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password',
        'store_name' => 'John\'s Store',
        'document' => '12345678900',
    ]))->toThrow(
        ValidationException::class,
    );
});

test('store_name should be required', function () {
    expect(fn() => CreateSeller::run([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password',
        'document' => '12345678900',
    ]))->toThrow(
        ValidationException::class,
    );
});

test('document should be required', function () {
    expect(fn() => CreateSeller::run([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password',
        'store_name' => 'John\'s Store',
        'document' => '',
    ]))->toThrow(
        ValidationException::class,
        __('validation.required', ['attribute' => 'document'])
    );
});

test('password should be required', function () {
    expect(fn() => CreateSeller::run([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => '',
        'store_name' => 'John\'s Store',
        'document' => '12345678900',
    ]))->toThrow(
        ValidationException::class,
        __('validation.required', ['attribute' => 'password'])
    );
});

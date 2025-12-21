<?php

use App\Actions\Category\CreateCategory;
use App\Models\Category;
use Illuminate\Validation\ValidationException;

use function Pest\Laravel\assertDatabaseHas;

test('should create a category', function () {
    $data = [
        'name' => 'Electronics',
        'slug' => 'electronics',
    ];

    $category = CreateCategory::run($data);

    expect($category)->toBeInstanceOf(Category::class);

    assertDatabaseHas('categories', [
        'name' => 'Electronics',
        'slug' => 'electronics',
    ]);
});

test('name should be required', function () {
    expect(fn () => CreateCategory::run([
        'slug' => 'some-slug',
    ]))->toThrow(
        Illuminate\Validation\ValidationException::class,
        __('validation.required', ['attribute' => 'name'])
    );
});

test('slug should be unique', function () {
    CreateCategory::run([
        'name' => 'Books',
        'slug' => 'books',
    ]);

    expect(fn () => CreateCategory::run([
        'name' => 'Another Books',
        'slug' => 'books',
    ]))->toThrow(
        ValidationException::class,
        __('validation.unique', ['attribute' => 'slug'])
    );
});

test('slug should be required', function () {
    expect(fn () => CreateCategory::run([
        'name' => 'Some Category',
    ]))->toThrow(
        ValidationException::class,
        __('validation.required', ['attribute' => 'slug'])
    );
});

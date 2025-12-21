<?php

use App\Actions\Category\CreateCategory;
use App\Actions\Category\UpdateCategory;

use function Pest\Laravel\assertDatabaseHas;

test('should update a category', function () {
    $category = CreateCategory::run([
        'name' => 'Old Name',
        'slug' => 'old-slug',
    ]);

    $data = [
        'id' => $category->id,
        'name' => 'New Name',
        'slug' => 'new-slug',
    ];

    $updatedRows = UpdateCategory::run($data);

    expect($updatedRows)->toBe(1);

    assertDatabaseHas('categories', [
        'id' => $category->id,
        'name' => 'New Name',
        'slug' => 'new-slug',
    ]);
});

test('should not be able to update to a existing slug', function () {
    $firstCategory = CreateCategory::run([
        'name' => 'First Category',
        'slug' => 'first-slug',
    ]);

    $secondCategory = CreateCategory::run([
        'name' => 'Second Category',
        'slug' => 'second-slug',
    ]);

    expect(fn () => UpdateCategory::run([
        'id' => $secondCategory->id,
        'name' => 'Updated Name',
        'slug' => 'first-slug', // Tentando usar o slug da primeira categoria
    ]))->toThrow(
        Illuminate\Validation\ValidationException::class,
        __('validation.unique', ['attribute' => 'slug'])
    );
});

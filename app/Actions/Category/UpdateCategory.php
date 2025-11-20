<?php

namespace App\Actions\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateCategory
{
    use AsAction;

    private function rules(array $data): array
    {
        return [
            'id' => 'required|exists:categories,id',
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|max:255|unique:categories,slug,' . ($data['id'] ?? 'NULL'),
        ];
    }

    public function handle(array $data): int
    {
        $validator = Validator::make($data, $this->rules($data));

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return Category::where('id', $data['id'])->update($validator->validated());
    }
}

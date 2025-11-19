<?php

namespace App\Actions\Seller;

use App\Models\Seller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateSeller
{
    use AsAction;

    public function rules(): array
    {
        return [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password'  => ['required', 'string', 'min:8'],
            'store_name' => ['required', 'string', 'max:255'],
            'document'  => ['required', 'string', 'unique:sellers,document'],
        ];
    }

    // IMPORTANTE: receba somente os dados já validados
    public function handle(array $data): Seller
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        /** @var User */
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->assignRole('seller');

        return Seller::create([
            'user_id'    => $user->id,
            'store_name' => $data['store_name'],
            'document'   => $data['document'],
        ]);
    }
}

<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class SellerProductScope implements Scope
{
    /**
     * Apply the scope returning only products of the authenticated seller.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (Auth::check() && Auth::user()->seller) {
            $builder->where('seller_id', Auth::user()->seller->id);
        }
    }
}

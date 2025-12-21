<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    /** @use HasFactory<\Database\Factories\EstablishmentFactory> */
    use HasFactory;

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function images()
    {
        return $this->hasMany(EstablishmentImages::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}

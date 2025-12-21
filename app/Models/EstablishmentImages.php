<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EstablishmentImages extends Model
{
    /** @use HasFactory<\Database\Factories\EstablishmentImagesFactory> */
    use HasFactory;

    public function establishment(): BelongsTo
    {
        return $this->belongsTo(Establishment::class);
    }
}

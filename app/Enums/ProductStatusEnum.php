<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self available()
 * @method static self lowStock()
 * @method static self outOfStock()
 */
final class ProductStatusEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'available' => 'available',
            'lowStock' => 'low_stock',
            'outOfStock' => 'out_of_stock',
        ];
    }
}

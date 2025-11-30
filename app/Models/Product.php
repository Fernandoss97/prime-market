<?php

namespace App\Models;

use App\Enums\ProductStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'brand',
        'slug',
        'description',
        'image',
        'price',
        'stock',
        'status',
        'is_active',
        'seller_id',
        'category_id',
    ];

    protected $casts = [
        'status' => ProductStatusEnum::class,
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['name', 'brand'])
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate()
            ->usingLanguage('pt')
            ->slugsShouldBeNoLongerThan(80);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // atualizar status baseado no stock

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

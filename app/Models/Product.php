<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    protected $casts = [
        'published_at' => 'timestamp'
    ];

    protected $fillable = [
        'uuid',
        'type',
        'sku',
        'additional',
        'published_at'
    ];


    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function collections(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Collection::class, 'product_collection');
    }

    public function attributes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function thumbnail(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Product::class);
    }



    protected static function boot()
    {
        parent::boot();

        self::creating( function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid()->toString();
            }
        });

    }

//    public function getKeyName(): string
//    {
//        return 'uuid';
//    }

    // used in factory
    public function productFlat(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ProductFlat::class, 'product_id');
    }
}

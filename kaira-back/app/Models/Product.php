<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'products';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'pending'     => 'Chop etilishni kutmoqda',
        'public'      => 'Chop etilgan',
        'block'       => 'Bloklangan',
        'unavailable' => 'Qolmagan',
    ];


    protected $fillable = [
        'name_ru',
        'name_uz',
        'description_ru',
        'description_uz',
        'material_id',
        'brand_id',
        'season_id',
        'country_id',
        'category_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
        $this->addMediaConversion('fixed_height')
            ->height(300)
            ->keepOriginalImageFormat();
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    //
    public function values()
    {
        return $this->hasMany(ProductValue::class, 'product_ids_id', 'id');
    }
    public function getMinPriceAttribute()
    {
        return $this->values()->min('price');
    }
}

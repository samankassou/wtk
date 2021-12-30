<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class City extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'is_featured'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('cover')
            ->singleFile()
            ->useFallbackUrl('/assets/img/example-image.jpg')
            ->useFallbackPath(public_path('/assets/img/example-image.jpg'));
    }

     public function registerMediaConversions(Media $media = null): void
     {

        $this->addMediaConversion('cover-sm')
        ->fit(Manipulations::FIT_CONTAIN, 480, 320)
        ->performOnCollections('cover');

     }

    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }

}

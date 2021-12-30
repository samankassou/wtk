<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Advert extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'type',
        'description',
        'content',
        'location',
        'latitude',
        'longitude',
        'number_of_bedrooms',
        'number_of_bathrooms',
        'number_of_floors',
        'is_featured',
        'moderation_status',
        'square',
        'price',
        'features',
        'youtube_video_thumbnail',
        'youtube_video_url',
        'status',
        'visit_fees',
        'commission',
        'category_id',
        'city_id',
        'user_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'features'    => 'array',
        'is_featured' => 'boolean',
        'square'      => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($advert) {
            $advert->slug = $advert->generateSlug($advert->title);
            $advert->save();
        });
    }

    private function generateSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereTitle($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }

        return $slug;
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('images')
            ->useFallbackUrl('/assets/img/example-image.jpg')
            ->useFallbackPath(public_path('/assets/img/example-image.jpg'));
    }

    public function registerMediaConversions(Media $media = null): void
    {

        $this->addMediaConversion('property-thumnail-xs')
            ->fit(Manipulations::FIT_CONTAIN, 75, 75)
            ->performOnCollections('images');

        $this->addMediaConversion('property-thumnail-sm')
            ->fit(Manipulations::FIT_CONTAIN, 150, 150)
            ->performOnCollections('images');

        $this->addMediaConversion('property-image-md')
            ->fit(Manipulations::FIT_CONTAIN, 480, 320)
            ->performOnCollections('images');

        $this->addMediaConversion('property-image-lg')
            ->fit(Manipulations::FIT_CONTAIN, 1024, 768)
            ->performOnCollections('images');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFormatedPrice()
    {
        return number_format($this->attributes['price'], 0, '.', ' ');
    }

    public function getFirstCategoryName()
    {
        return $this->categories->first()->name;
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('moderation_status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('moderation_status', 'pending');
    }

    public function scopeRejected($query)
    {
        return $query->where('moderation_status', 'rejected');
    }

    public function scopeRenting($query)
    {
        return $query->where('type', 'rent');
    }

    public function scopeSelling($query)
    {
        return $query->where('type', 'sale');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}

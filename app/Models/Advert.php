<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

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
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('images')
            ->useFallbackUrl('/assets/img/example-image.jpg')
            ->useFallbackPath(public_path('/assets/img/example-image.jpg'));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
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
}

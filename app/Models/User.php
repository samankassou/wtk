<?php

namespace App\Models;

use Carbon\Carbon;
use Spatie\Image\Manipulations;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'remember_token',
        'company_name',
        'phone',
        'dob',
        'is_featured',
        'biography',
        'birthday',
        'gender',
        'social_links',
        'role',
        'credits',
        'is_super_user',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday'          => 'datetime',
        'social_links'      => 'array',
        'is_super_user'     => 'boolean'
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile()
            ->useFallbackUrl('/assets/img/avatar-1.png')
            ->useFallbackPath(public_path('/assets/img/avatar-1.png'));
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('avatar-thumbnail')
            ->fit(Manipulations::FIT_CONTAIN, 75, 75)
            ->performOnCollections('avatar');
    }

    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }

    public function properties()
    {
        return $this->hasMany(Advert::class, 'user_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeSuspended($query)
    {
        return $query->where('status', 'suspended');
    }

    public function scopeAgent($query)
    {
        return $query->where('role', 'agent');
    }

    public function scopeFeaturedAgent($query)
    {
        return $this->agent()->where('is_featured', 1);
    }

    public function scopeActiveAgent($query)
    {
        return $query->agent()->active();
    }

    public function scopeSuspendedAgent($query)
    {
        return $query->agent()->suspended();
    }

    public function scopeNotAgent($query)
    {
        return $query->where('role', '!=', 'agent');
    }

    public function getDobAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setDobAttribute($value)
    {
        if($value){
            $this->attributes['dob'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
        }
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = "237".$value;
    }

    public function getPhoneAttribute($value)
    {
        return $value ? substr($value, 3) : null;
    }
}

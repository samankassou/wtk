<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'is_featured',
        'parent_id',
        'description'
    ];

    public function adverts()
    {
        return $this->belongsToMany(Advert::class);
    }

    public function scopeCategories($query)
    {
        return $query->whereNull('parent_id');
    }
}

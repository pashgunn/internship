<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function mainCars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function additionalCars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class);
    }

    public function banners(): HasMany
    {
        return $this->hasMany(Banner::class);
    }
}

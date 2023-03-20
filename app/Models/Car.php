<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'body', 'price', 'old_price', 'car_body_id'];

    public function carBody(): BelongsTo
    {
        return $this->belongsTo(CarBody::class);
    }

    public function carClass(): BelongsTo
    {
        return $this->belongsTo(CarClass::class);
    }

    public function carEngine(): BelongsTo
    {
        return $this->belongsTo(CarEngine::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function mainImage(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id');
    }

    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class);
    }
}

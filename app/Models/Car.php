<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;

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
}

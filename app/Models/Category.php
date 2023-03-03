<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;

    protected $guarded = [];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}

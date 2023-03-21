<?php

namespace App\Models;

use App\Contracts\HasTags;
use App\Events\ArticleCreated;
use App\Events\ArticleDeleted;
use App\Events\ArticleUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Cache;

class Article extends Model implements HasTags
{
    use HasFactory;

    protected $guarded = [];

    protected $dispatchesEvents = [
      'created' => ArticleCreated::class,
      'updated' => ArticleUpdated::class,
      'deleted' => ArticleDeleted::class
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::created(function () {
            Cache::tags(['articles'])->flush();
        });

        static::updated(function () {
            Cache::tags(['articles'])->flush();
        });

        static::deleted(function () {
            Cache::tags(['articles', 'images', 'tags'])->flush();
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}

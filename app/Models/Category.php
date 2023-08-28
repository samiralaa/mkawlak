<?php

namespace App\Models;

use App\Models\Post;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the Post for the blog Category.
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the Post for the blog Category.
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('default');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('default')->fit(Manipulations::FIT_CROP, 300, 300)->nonQueued();
    }
}

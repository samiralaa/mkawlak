<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'location',
        'requirement',
        'note',
        'space',
        'user_id',
        'category_id',
        'building_type',
        'client_type',
        'type_employment',
        'width',
        'length',
        'plan',
        'floors'
    ];

    /**
     * Get the Post that owns the User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the Post that owns the Category.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function offers(){
        return $this->hasMany(Offer::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('default')->fit(Manipulations::FIT_CROP, 300, 300);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('default');
    }
}

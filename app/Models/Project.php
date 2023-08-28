<?php

namespace App\Models;

use App\Models\Category;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'city',
        'description',
        'project_duration',
        'customer_evaluation',
        'company_id',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
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

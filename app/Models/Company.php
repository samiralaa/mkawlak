<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable implements JWTSubject, HasMedia
{
    use HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'name_company',
        'address',
        'address_company',
        'email',
        'id_personal',
        'commercial_register',
        'code',
        'otp',
        'citys',
        'majors',
        'email_verified_at',
        'password',
        'company_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'code',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function setCitysAttribute($value)
    {
        $this->attributes['citys'] = implode(',', $value);
    }

    public function setMajorsAttribute($value)
    {
        $this->attributes['majors'] = implode(',', $value);
    }

    public function getCitysAttribute($value)
    {
        return explode(',', $value);
    }

    public function getMajorsAttribute($value)
    {
        return explode(',', $value);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('default')->singleFile();
        $this->addMediaCollection('id_photo')->singleFile();
        $this->addMediaCollection('company_profile')->singleFile();
        $this->addMediaCollection('commercial_registration_file')->singleFile();
    }

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('default')->fit(Manipulations::FIT_CROP, 300, 300)->nonQueued();
    //     $this->addMediaConversion('id_photo')->fit(Manipulations::FIT_CROP, 300, 300)->nonQueued();
    // }
}

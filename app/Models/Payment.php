<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'status',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

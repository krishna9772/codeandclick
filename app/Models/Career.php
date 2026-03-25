<?php

namespace App\Models;

use App\Models\Concerns\HasLocalizedAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Career extends Model 
{
    /** @use HasFactory<\Database\Factories\CareerFactory> */
    use HasFactory, SoftDeletes, HasLocalizedAttributes;

    protected $fillable = [
        'title',
        'title_mm',
        'ignite',
        'ignite_mm',
        'role',
        'role_mm',
        'benefits',
        'benefits_mm',
        'requirements',
        'requirements_mm',
        'responsibilities',
        'responsibilities_mm',
        'salary',
        'location',
        'status',
    ];

    public function getSlugAttribute(): string
    {
        return Str::slug($this->title);
    }
}

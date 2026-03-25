<?php

namespace App\Models;

use App\Models\Concerns\HasLocalizedAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Venture extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\VentureFactory> */
    use HasFactory, SoftDeletes, InteractsWithMedia, HasLocalizedAttributes;

    protected $fillable = [
        'title',
        'title_mm',
        'subtitle',
        'link',
        'content',
        'content_mm',
        'status',
    ];


}

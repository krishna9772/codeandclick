<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Venture extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\VentureFactory> */
    use HasFactory,SoftDeletes,InteractsWithMedia;

    protected $fillable = [
        'title',
        'subtitle',
        'link',
        'content',
        'status',
    ];


}

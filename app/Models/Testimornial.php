<?php

namespace App\Models;

use App\Models\Concerns\HasLocalizedAttributes;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Testimornial extends Model implements HasMedia
{
    use InteractsWithMedia, HasLocalizedAttributes;

    protected $fillable = [
        'name',
        'name_mm',
        'description',
        'description_mm',
        'image',
    ];
}

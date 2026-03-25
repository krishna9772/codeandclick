<?php

namespace App\Models;

use App\Models\Concerns\HasLocalizedAttributes;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasLocalizedAttributes;

    protected $fillable = [
        'title',
        'title_mm',
        'description',
        'description_mm',
        'keyword',
        'keyword_mm',
        'seoable_id',
        'seoable_type',
    ];

    public function seoable() {
        return $this->morphTo();
    }
}

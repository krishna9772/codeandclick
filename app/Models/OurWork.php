<?php

namespace App\Models;

use App\Models\Concerns\HasLocalizedAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class OurWork extends Model implements HasMedia
{

    use InteractsWithMedia;
    use SoftDeletes;
    use HasLocalizedAttributes;

    protected $fillable = [
        'title',
        'title_mm',
        'content',
        'content_mm',
        'serviceID',
        'status',
        'slug',
        'type'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title);
        });

        static::created(function ($model) {
            $model->seos()->create([
                'title' => $model->title,
                'description' =>  Str::limit(strip_tags($model->content), 150),
                'keyword' => $model->title,
                'title_mm' => $model->title_mm,
                'description_mm' => $model->content_mm ? Str::limit(strip_tags($model->content_mm), 150) : null,
                'keyword_mm' => $model->title_mm,
            ]);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->title);
        });

        static::updated(function ($model) {
            $model->seos()->update([
                'title' => $model->title,
                'description' => Str::limit(strip_tags($model->content), 150),
                'keyword' => $model->title,
                'title_mm' => $model->title_mm,
                'description_mm' => $model->content_mm ? Str::limit(strip_tags($model->content_mm), 150) : null,
                'keyword_mm' => $model->title_mm,
            ]);
        });

        static::deleting(function ($model) {
            $model->seos()->delete();
        });
    }

    // In OurWork.php model
public function service()
{
    return $this->belongsTo(Service::class, 'serviceID');
}

public function seos() {
    return $this->morphOne(Seo::class, 'seoable');
}

}

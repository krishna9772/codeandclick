<?php

namespace App\Models;

use App\Models\Concerns\HasLocalizedAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Service extends Model implements HasMedia
{
    use InteractsWithMedia;
    use SoftDeletes;
    use HasLocalizedAttributes;

    protected $fillable = [
        'title',
        'title_mm',
        'name',
        'name_mm',
        'slug',
        'status',
        'main_content',
        'main_content_mm',
        'tags',
        'tags_mm',
        'sub_content',
        'sub_content_mm',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);
           
        });

        static::created(function ($model) {
            $model->seos()->create([
                'title' => $model->title,
                'description' => Str::limit(strip_tags($model->main_content), 150),
                'keyword' => $model->tags,
                'title_mm' => $model->title_mm,
                'description_mm' => $model->main_content_mm ? Str::limit(strip_tags($model->main_content_mm), 150) : null,
                'keyword_mm' => $model->tags_mm,
            ]);
        }); 
        
        static::updating(function ($model) {
            $model->slug = Str::slug($model->name);
        });

        static::updated(function ($model) {
            $model->seos()->update([
                'title' => $model->title,
                'description' => Str::limit(strip_tags($model->main_content), 150),
                'keyword' => $model->tags,
                'title_mm' => $model->title_mm,
                'description_mm' => $model->main_content_mm ? Str::limit(strip_tags($model->main_content_mm), 150) : null,
                'keyword_mm' => $model->tags_mm,
            ]);
        });

        static::deleting(function ($model) {
            $model->seos()->delete();
        });
    }

    public function works() {
        return $this->hasMany(OurWork::class,"serviceID");
    }

    public function seos() {
        return $this->morphOne(Seo::class, 'seoable');
    }
}

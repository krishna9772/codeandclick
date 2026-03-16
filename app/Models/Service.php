<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Service extends Model implements HasMedia
{
    use InteractsWithMedia;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'name',
        'slug',
        'status',
        'main_content',
        'tags',
        'sub_content'
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

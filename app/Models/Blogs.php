<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Blogs extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\BlogsFactory> */
    use HasFactory,SoftDeletes,InteractsWithMedia;

    protected $table = 'blogs';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
            $model->slug = Str::slug($model->title);
        });

        static::created(function ($model) {
            $model->seos()->create([
                'title' => $model->title,
                'description' => Str::limit($model->preview, 300),
                'keyword' => $model->title,
            ]);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->title);
        });

        static::updated(function ($model) {
            $model->seos()->update([
                'title' => $model->title,
                'description' => Str::limit($model->preview, 300),
                'keyword' => $model->title,
            ]);
        });

        static::deleting(function ($model) {
            $model->seos()->delete();
        });


    }

    protected $fillable = [
        'uuid',
        'slug',
        'user_id',
        'title',
        'type',
        'status',
        'content',
        'preview',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seos() {
        return $this->morphOne(Seo::class, 'seoable');
    }
}

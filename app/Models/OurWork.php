<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class OurWork extends Model implements HasMedia
{

    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'serviceID',
        'status',
        'slug'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
    }

    // In OurWork.php model
public function service()
{
    return $this->belongsTo(Service::class, 'serviceID');
}


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'business_name',
        'business_type',
        'phone',
        'website',
        'location',
        'hear_about_us',
        'receive_insight',
        'budget',
        'about_project',
        'service_looking_for',
    ];
}

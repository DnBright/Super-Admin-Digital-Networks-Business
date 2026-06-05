<?php

namespace App\Domains\WebDev\Models;

use Illuminate\Database\Eloquent\Model;

class WebTemplate extends Model
{
    protected $connection = 'webdev';
    
    protected $table = 'templates';

    protected $guarded = [];

    protected $casts = [
        'packages' => 'array',
        'reviews' => 'array',
    ];

    public function webReviews()
    {
        return $this->hasMany(WebReview::class, 'template_id')->latest();
    }

    public function averageRating()
    {
        return $this->webReviews()->where('is_approved', true)->avg('rating') ?? 0;
    }
}

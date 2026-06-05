<?php

namespace App\Domains\WebDev\Models;

use Illuminate\Database\Eloquent\Model;

class WebReview extends Model
{
    protected $connection = 'webdev';

    protected $table = 'template_reviews';

    protected $fillable = [
        'template_id',
        'name',
        'email',
        'rating',
        'comment',
        'is_approved',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function webTemplate()
    {
        return $this->belongsTo(WebTemplate::class, 'template_id');
    }
}

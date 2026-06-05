<?php

namespace App\Domains\WebDev\Models;

use Illuminate\Database\Eloquent\Model;

class WebPackage extends Model
{
    protected $connection = 'webdev';

    protected $table = 'pricing_packages';

    protected $guarded = [];

    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
    ];
}

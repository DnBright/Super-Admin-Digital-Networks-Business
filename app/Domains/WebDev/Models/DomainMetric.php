<?php

namespace App\Domains\WebDev\Models;

use Illuminate\Database\Eloquent\Model;

class DomainMetric extends Model
{
    protected $fillable = [
        'domain',
        'uptime_percentage',
        'ssl_expiry_date',
        'last_checked_at',
    ];
}

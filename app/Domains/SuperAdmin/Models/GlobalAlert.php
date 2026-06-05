<?php

namespace App\Domains\SuperAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalAlert extends Model
{
    protected $fillable = [
        'division',
        'alert_level',
        'message',
        'is_resolved',
    ];
}

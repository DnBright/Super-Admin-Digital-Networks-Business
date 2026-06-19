<?php

namespace App\Domains\SuperAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];
}

<?php

namespace App\Domains\SuperAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class DivisionSetting extends Model
{
    protected $fillable = [
        'name',
        'key',
        'color',
        'domain',
        'db_name',
        'db_user',
        'db_password',
        'folder',
    ];
}

<?php

namespace App\Domains\WebDev\Models;

use Illuminate\Database\Eloquent\Model;

class WebProject extends Model
{
    protected $fillable = [
        'name',
        'domain',
        'cpanel_username',
        'db_name',
    ];
}

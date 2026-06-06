<?php

namespace App\Domains\Design3DArsitek\Models;

use Illuminate\Database\Eloquent\Model;

class NasHealth extends Model
{
    protected $fillable = [
        'nas_ip',
        'free_space_bytes',
        'total_space_bytes',
        'is_online',
    ];
}

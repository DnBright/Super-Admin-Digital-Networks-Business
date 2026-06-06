<?php

namespace App\Domains\Design3DArsitek\Models;

use Illuminate\Database\Eloquent\Model;

class VideoProject extends Model
{
    protected $fillable = [
        'name',
        'raw_storage_path',
        'status',
        'output_duration_seconds',
    ];
}

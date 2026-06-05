<?php

namespace App\Domains\BrandIdentity\Models;

use Illuminate\Database\Eloquent\Model;

class DesignProject extends Model
{
    protected $fillable = [
        'name',
        'client_id',
        'status',
        'revision_count',
    ];
}

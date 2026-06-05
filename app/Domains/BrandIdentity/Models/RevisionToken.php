<?php

namespace App\Domains\BrandIdentity\Models;

use Illuminate\Database\Eloquent\Model;

class RevisionToken extends Model
{
    protected $fillable = [
        'design_project_id',
        'token',
        'expires_at',
        'is_used',
    ];
}

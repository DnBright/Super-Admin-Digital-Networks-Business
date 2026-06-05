<?php

namespace App\Domains\WebDev\Models;

use Illuminate\Database\Eloquent\Model;

class WebChatMessage extends Model
{
    protected $connection = 'webdev';

    protected $table = 'chat_messages';

    protected $fillable = [
        'session_id',
        'name',
        'email_whatsapp',
        'message',
        'is_from_admin',
        'is_read',
    ];

    protected $casts = [
        'is_from_admin' => 'boolean',
        'is_read' => 'boolean',
    ];
}

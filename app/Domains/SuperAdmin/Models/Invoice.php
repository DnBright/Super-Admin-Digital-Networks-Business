<?php

namespace App\Domains\SuperAdmin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_no',
        'client_name',
        'division',
        'amount',
        'due_date',
        'status',
        'previous_hash',
        'hash',
    ];
}

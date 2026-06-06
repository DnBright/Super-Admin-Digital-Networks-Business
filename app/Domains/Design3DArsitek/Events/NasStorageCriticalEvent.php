<?php

namespace App\Domains\Design3DArsitek\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NasStorageCriticalEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $nasIp;
    public $freeSpaceBytes;

    public function __construct(string $nasIp, int $freeSpaceBytes)
    {
        $this->nasIp = $nasIp;
        $this->freeSpaceBytes = $freeSpaceBytes;
    }
}

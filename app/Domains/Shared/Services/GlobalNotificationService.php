<?php

namespace App\Domains\Shared\Services;

class GlobalNotificationService
{
    public function sendEmail(string $to, string $subject, string $body): bool
    {
        // Placeholder implementation
        return true;
    }

    public function sendSystemAlert(string $message, string $level = 'info'): bool
    {
        // Placeholder implementation
        return true;
    }
}

<?php

namespace App\Domains\Shared\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait FileStorageTrait
{
    public function uploadFile(UploadedFile $file, string $folder = 'uploads', string $disk = 'public'): string
    {
        return $file->store($folder, $disk);
    }

    public function deleteFile(string $path, string $disk = 'public'): bool
    {
        if (Storage::disk($disk)->exists($path)) {
            return Storage::disk($disk)->delete($path);
        }
        return false;
    }
}

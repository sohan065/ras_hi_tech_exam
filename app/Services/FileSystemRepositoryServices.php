<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use App\Repositories\FileSystemRepositoryInterface;

class FileSystemRepositoryServices implements FileSystemRepositoryInterface
{

    public function storeFile($file, $directory)
    {
        try {
            $filename = Str::random(30) . '.' . $file->extension();
            $filepath = $file->move($directory, $filename);
            $filepath = Str::replace('\\', '/', $filepath);
            $domain = request()->getHttpHost();
            $filepath = 'http://' . $domain . '/' . $filepath;
        } catch (Exception $e) {
            Log::error($e);
            $filepath = false;
        }
        return $filepath;
    }

    public function deleteFile($path)
    {
        try {
            $host = request()->getHttpHost();
            $path = str_replace('http://' . $host . '/', "", $path);
            $result = File::delete($path);
        } catch (Exception $e) {
            Log::error($e);
            $result = false;
        }
        return $result;
    }
}

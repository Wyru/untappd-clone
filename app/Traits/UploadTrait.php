<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

trait UploadTrait
{
    public function uploadFile(UploadedFile $file, $path)
    {
        $real_path = file_get_contents($file->getRealPath());
        $extension = $file->getClientOriginalExtension();

        // Usado para adicionar o file com o nome original do arquivo
        // $storage_path = $path.$file->getClientOriginalName()

        // Usado para adicionar o file com o nome gerado no upload
        $storage_path = $path.$file->getFilename().'.'.$extension;

        Storage::put($storage_path, $real_path);

        $db_path = $storage_path;

        return $db_path;
    }
}
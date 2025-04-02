<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadTrait
{
    /**
     * رفع الملف إلى التخزين المحدد.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory
     * @return string
     */
    public function uploadFile($file, $directory)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('public/' . $directory, $fileName);
    }

    /**
     * حذف الملف من التخزين.
     *
     * @param string $filePath
     * @return bool
     */
    public function deleteFile($filePath)
    {
        $filePath = str_replace('\\', '/', $filePath); // التوافق مع جميع الأنظمة
        if (Storage::exists($filePath)) {
            return Storage::delete($filePath);
        }
        return false;
    }
}

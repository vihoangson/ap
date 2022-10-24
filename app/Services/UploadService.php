<?php

namespace App\Services;

use App\Models\Upload;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadService {

    public static function processUpload($uploadedFile, $filename) {

        if (!(substr($uploadedFile->getMimeType(), 0, 5) == 'image')) {
            // File Bình Thường
            if (false) {
                $filename = time() . '_' . $filename;
                $f        = $uploadedFile;
                $upload   = self::uploadFile($f, $filename);

                return $upload;
            } else {
                return null;
            }
        }

        $uploadedFile->getClientOriginalExtension();
        $filename_hashed = time() . '_' . md5($uploadedFile->getClientOriginalName()) . '.' . $uploadedFile->getClientOriginalExtension();

        // Khởi tạo biến image
        $image = Image::make($uploadedFile->path())->orientate();

        // Tạo file origin
        $image->save(storage_path('framework/cache/' . 'origin_' . $filename_hashed));

        // Resize và tạo file nếu trên kích thước 1000
        if ($image->width() > 1000 && $image->height() > 1000) {
            $image->fit(1000, 1000)
                  ->save(storage_path('framework/cache/' . 'huge_' . $filename_hashed));
        }

        /** @var File $cccm */
        $cccm = new File(storage_path('framework/cache/' . 'origin_' . $filename_hashed));
        $f    = $cccm->move(storage_path());

        $upload = self::uploadFile($f, $filename);

        return $upload;
    }

    public static function uploadFile($f, $filename = null) {
        $path = '/files/' . $filename . '/';
        Storage::disk(config('app.storage_disk_chat'))
               ->putFileAs($path, $f, $filename);
        $upload           = new Upload;
        $upload->filename = $filename;
        $upload->path     = $path . $filename;
        $upload->disk     = config('app.storage_disk_chat');
        $upload->save();

        return $upload;
    }
}

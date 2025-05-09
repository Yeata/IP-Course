<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->validate([
            'document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ])['document'];

        $extension = strtolower($file->getClientOriginalExtension());
        $fileName = uniqid('', true) . '.' . $extension;

        // Save to local storage
        $localPath = $file->storeAs('uploads_image', $fileName, 'public');

        // Save to MinIO
        Storage::disk('minio')->putFileAs('uploads_image', $file, $fileName);

        // Handle thumbnail if image
        $thumbnailPath = $this->handleThumbnail($file, $fileName, $extension);

        return response()->json([
            'local_path' => $localPath,
            'minio_path' => 'uploads_image/' . $fileName,
            'thumbnail_path' => $thumbnailPath,
        ]);
    }

    protected function handleThumbnail($file, $fileName, $extension)
    {
        if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
            return null;
        }

        $image = Image::make($file)
            ->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode($extension);

        $path = 'thumbnails/' . $fileName;
        Storage::disk('minio')->put($path, (string) $image);

        return $path;
    }
}

<?php

namespace App\Service;

use App\Property;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function swapImage($oldImage, $newImage)
    {
        if ($newImage) {
            $this->unlinkImage($oldImage);
            return $this->storeImage($newImage);
        }

        return $oldImage;
    }

    public function storeImage($image)
    {
        $baseDir = config('constants.image_directory') . '/' . date('Y') . '/' . date('M');
        $imagePath = Storage::putFile($baseDir, $image);
        Log::info('Saved New Image');
        return $imagePath;
    }

    public function unlinkImage($image)
    {
        if (Storage::exists($image)) {
            Log::info('Deleting older image ' . $image);
            Storage::delete($image);
        }
        return true;
    }
}

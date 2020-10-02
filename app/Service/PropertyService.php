<?php

namespace App\Service;

use App\Property;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PropertyService
{
    public function syncPropertyImage(Property $property)
    {
        if (request()->hasFile('image')) {
            if ($property->image) {
                $this->unlinkImage($property->image);
            }
            return $this->storeImage(request()->file('image'));
        }
        return $property->image;
    }

    public function storeImage($image)
    {
        $baseDir = config('property.image_directory') . '/' . date('Y') . '/' . date('M');
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

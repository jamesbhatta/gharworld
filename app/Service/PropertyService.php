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
                $this->unlinkPropertyImage($property);
            }
            $baseDir = config('property.cover_image_directory') . '/' . date('Y') . '/' . date('M');
            $imagePath = Storage::putFile($baseDir, request()->file('image'));
            Log::info('Saved New Image');
            return $imagePath;
        }
        return $property->image;
    }

    public function unlinkPropertyImage(Property $property)
    {
        if (Storage::exists($property->image)) {
            Log::info('Deleting older image ' . $property->image);
            Storage::delete($property->image);
        }
        return true;
    }
}

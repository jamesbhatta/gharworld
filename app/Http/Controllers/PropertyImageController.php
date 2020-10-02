<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyImageRequest;
use App\Property;
use App\PropertyImage;
use App\Service\PropertyService;

class PropertyImageController extends Controller
{
    private $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    /**
     * List property image
     *
     * @param  mixed $property_id
     * @return void
     */
    public function index($property_id)
    {
        $propertyImages = PropertyImage::where('property_id', $property_id)->latest('id')->get();

        $propertyImages = $propertyImages->map(function ($propertyImage) {
            $propertyImage['url'] = $propertyImage->getUrl();
            return $propertyImage;
        });

        return response()->json($propertyImages);
    }

    /**
     * Store property image
     *
     * @param  mixed $request
     * @return void
     */
    public function store(PropertyImageRequest $request)
    {
        $property = Property::findOrFail($request->property_id);

        if ($request->file('file')) {
            $property->images()->create([
                'link' => $this->propertyService->storeImage($request->file('file'))
            ]);
            return $property;
        }

        return response()->json([
            'success' => 'Image Saved'
        ]);
    }

    /**
     * Delete property image
     *
     * @param  mixed $propertyImage
     * @return void
     */
    public function destroy(PropertyImage $propertyImage)
    {
        try {
            if ($this->propertyService->unlinkImage($propertyImage->link)) {
                $propertyImage->delete();
            }
            return response()->json(null, 204);
        } catch (Exception $e) {
            return response()->json(null, 500);
        }
    }
}

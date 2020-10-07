<?php

namespace App\Service;

use App\Profession;
use App\Service\ImageService;

class ProfessionService
{
    private $imageService;
 
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function create($data)
    {
        if (array_key_exists('image', $data)) {
            $data['image'] = $this->imageService->storeImage($data['image']);
        }
        return Profession::create($data);
    }

    public function update(Profession $profession, $data)
    {
        if (array_key_exists('image', $data)) {
            $data['image'] = $this->imageService->swapImage($profession->image, $data['image']);
        }
        return $profession->update($data);
    }
}

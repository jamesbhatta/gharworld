<?php

namespace App\Service;

use App\LocalContact;

class LocalContactService
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

        return LocalContact::create($data);
    }

    public function update(LocalContact $localContact, $data)
    {
        if (array_key_exists('image', $data)) {
            $data['image'] = $this->imageService->swapImage($localContact->image, $data['image']);
        }

        return $localContact->update($data);
    }
}

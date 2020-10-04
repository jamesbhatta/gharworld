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
        $data['image'] = $this->imageService->storeImage($data['image']);

        return LocalContact::create($data);
    }
}

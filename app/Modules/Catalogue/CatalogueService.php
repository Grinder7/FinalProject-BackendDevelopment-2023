<?php

declare(strict_types=1);

namespace App\Modules\Catalogue;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Catalogue\CatalogueRepository;

class CatalogueService
{
    public CatalogueRepository $catalogueRepository;

    public function __construct(CatalogueRepository $catalogueRepository)
    {
        $this->catalogueRepository = $catalogueRepository;
    }

    public function getAllData(): Collection
    {
        return $this->catalogueRepository->getAllCatalogue();
    }
}

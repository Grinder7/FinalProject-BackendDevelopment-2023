<?php

declare(strict_types=1);

namespace App\Modules\Catalogue;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Catalogue\CatalogueRepository;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function getPaginatedCatalogue(int $page, string $column): LengthAwarePaginator
    {
        return $this->catalogueRepository->getCataloguePaginated($page, $column);
    }
}

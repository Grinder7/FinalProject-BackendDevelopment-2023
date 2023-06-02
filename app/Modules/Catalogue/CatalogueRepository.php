<?php

declare(strict_types=1);

namespace App\Modules\Catalogue;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Catalogue;
use Illuminate\Pagination\LengthAwarePaginator;

class CatalogueRepository
{
    public function getAllCatalogue(): Collection
    {
        return Catalogue::all();
    }
    public function getCataloguePaginated(int $page, string $column): LengthAwarePaginator
    {
        return Catalogue::orderby($column, 'desc')->paginate($page);
    }
}

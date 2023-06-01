<?php

declare(strict_types=1);

namespace App\Modules\Catalogue;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Catalogue;

class CatalogueRepository
{
    public function getAllCatalogue(): Collection
    {
        return Catalogue::all();
    }
}

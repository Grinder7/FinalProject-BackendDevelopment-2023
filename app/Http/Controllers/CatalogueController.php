<?php

namespace App\Http\Controllers;

use App\Modules\Catalogue\CatalogueService;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{

    private CatalogueService $catalogueService;
    public function __construct(CatalogueService $catalogueService)
    {
        $this->catalogueService = $catalogueService;
    }
    public function index()
    {
        $catalogues = $this->catalogueService->getPaginatedCatalogue(6, 'name');
        return view('pages.catalogue', compact('catalogues'));
    }
}

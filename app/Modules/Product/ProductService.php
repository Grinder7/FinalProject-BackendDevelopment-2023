<?php

declare(strict_types=1);

namespace App\Modules\Product;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    public ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllData(): Collection
    {
        return $this->productRepository->getAllProduct();
    }

    public function getPaginatedProduct(int $page, string $column): LengthAwarePaginator
    {
        return $this->productRepository->getProductPaginated($page, $column);
    }
}

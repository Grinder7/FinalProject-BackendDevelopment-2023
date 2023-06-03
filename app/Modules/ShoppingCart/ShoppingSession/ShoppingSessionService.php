<?php

declare(strict_types=1);

namespace App\Modules\ShoppingCart\ShoppingSession;

use App\Models\ShoppingSession;

class ShoppingSessionService
{
    public ShoppingSessionRepository $shoppingSessionRepository;
    public function __construct(ShoppingSessionRepository $shoppingSessionRepository)
    {
        $this->shoppingSessionRepository = $shoppingSessionRepository;
    }
    public function getAllData()
    {
        return $this->shoppingSessionRepository->getAllData();
    }
}

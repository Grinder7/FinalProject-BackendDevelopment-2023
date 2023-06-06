<?php

declare(strict_types=1);

namespace App\Modules\ShoppingCart\OrderDetail;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Collection;

class OrderDetailRepository
{
    public function getAllData(): Collection
    {
        return OrderDetail::all();
    }
}

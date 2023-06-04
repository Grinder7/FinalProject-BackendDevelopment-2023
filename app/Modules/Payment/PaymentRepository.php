<?php

declare(strict_types=1);

namespace App\Modules\Payment;

use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class PaymentRepository
{
    public function createPayment(array $data): void
    {
        Payment::create($data);
    }
    public function getByUserId(string $id)
    {
        return DB::table('payments')
            ->where('user_id', $id)
            ->get();
    }
}

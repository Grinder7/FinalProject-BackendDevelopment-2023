<?php

declare(strict_types=1);

namespace App\Modules\Payment;

use App\Models\Payment;

class PaymentService
{
    public PaymentRepository $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function createPayment(array $data): void
    {
        $this->paymentRepository->createPayment($data);
    }

    public function getByUserId(string $id)
    {
        return $this->paymentRepository->getByUserId($id);
    }
}

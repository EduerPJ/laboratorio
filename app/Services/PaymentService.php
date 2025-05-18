<?php

namespace App\Services;

use App\Contracts\PaymentGateway;

class PaymentService implements PaymentGateway
{
    public function __construct(
        protected PaymentGateway $gateway
    ) {}

    public function process(float $amount): float
    {
        return $this->$gateway->charge($amount);
    }
}

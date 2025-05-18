<?php

namespace App\Services;

use App\Contracts\PaymentGateway;

class StripeGateway implements PaymentGateway
{
    public function charge(float $amount): float
    {
        logger('Cobrando @amount con Stripe');

        return true;
    }
}

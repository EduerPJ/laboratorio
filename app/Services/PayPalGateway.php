<?php

namespace App\Services;

use App\Contracts\PaymentGateway;

class PayPalGateway implements PaymentGateway
{
    public function charge(float $amount): float
    {
        logger('Cobrando @amount con PayPal');

        return true;
    }
}

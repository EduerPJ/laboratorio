<?php

namespace App\Services;

use App\Contracts\PaymentGateway;

class ReportAggregator
{
    public function __construct(
        protected PaymentGateway ...$gateways
    ) {}

    public function report()
    {
        foreach ($gateways as $gateway) {
            $gateway->charge(1.00);
        }
    }
}

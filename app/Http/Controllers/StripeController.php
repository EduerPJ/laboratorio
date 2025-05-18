<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;

class StripeController extends Controller
{
    public function __construct(
        protected PaymentService $service
    ) {}

    public function pay()
    {
        $this->service->process(99.99);
    }
}

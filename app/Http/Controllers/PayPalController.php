<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;

class PayPalController extends Controller
{
    public function __construct(
        protected PaymentService $service
    ) {}

    public function pay()
    {
        $this->service->process(49.99);
    }
}

<?php

namespace App\Services;

use App\Contracts\PaymentGateway;

class ReportAggregator
{
    protected array $gateways;

    public function __construct(
        PaymentGateway ...$gateways
    ) {
        $this->gateways = $gateways;
    }

    public function report()
    {
        foreach ($this->gateways as $gateway) {
            $gatewayName = class_basename($gateway);
            echo "[INFO] Ejecutando reporte en $gatewayName...\n";
            $result = $gateway->charge(1.00);
            echo $result
                ? "✅ $gatewayName procesó corectamente el cargo\n"
                : "❌ $gatewayName falló el procesar el cargo\n";
        }
    }
}

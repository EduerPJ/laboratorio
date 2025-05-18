<?php

namespace App\Providers;

use App\Contracts\PaymentGateway;
use App\Http\Controllers\PayPalController;
use App\Services\PayPalGateway;
use App\Services\StripeGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // General interface binding (fallback)
        $this->app->bind(PaymentGateway::class, StripeGateway::class);

        // Contextual Binding por controlador
        $this->app->when(PayPalController::class)
            ->needs(PaymentGateway::class)
            ->give(PayPalGateway::class);

        // Singleton para reportes
        $this->app->singleton(ReportAgregator::class, function ($app) {
            return new ReportAgregator(...$app->tagged('payment_gateways'));
        });

        // Taggear las implementaciones
        $this->app->tag([
            StripeGateway::class,
            PayPalGateway::class,
        ], 'payment_gateways');
    }

    public function boot(): void
    {
        //
    }
}

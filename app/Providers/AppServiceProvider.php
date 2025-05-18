<?php

namespace App\Providers;

use App\Contracts\PaymentGateway;
use App\Http\Controllers\PayPalController;
use App\Services\PayPalGateway;
use App\Services\ReportAggregator;
use App\Services\StripeGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PaymentGateway::class, StripeGateway::class);

        $this->app->when(PayPalController::class)
            ->needs(PaymentGateway::class)
            ->give(PayPalGateway::class);

        $this->app->singleton(StripeGateway::class);
        $this->app->singleton(PayPalGateway::class);

        $this->app->tag([
            StripeGateway::class,
            PayPalGateway::class,
        ], 'payment_gateways');

        $this->app->singleton(ReportAggregator::class, function ($app) {
            return new ReportAggregator(...$app->tagged('payment_gateways'));
        });
    }

    public function boot(): void
    {
        //
    }
}

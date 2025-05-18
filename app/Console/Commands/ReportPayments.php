<?php

namespace App\Console\Commands;

use App\Services\ReportAggregator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ReportPayments extends Command
{
    protected $signature = 'app:report-payments';

    protected $description = 'Genera un reporte usando todos los payment gateways taggeados';

    public function handle(ReportAggregator $aggregator)
    {
        Log::info('Comando report:payments ejecutado a las ' . now());

        $this->info('Generando reporte...');
        $aggregator->report();
        $this->info('Reporte generado exitosamente');
    }
}

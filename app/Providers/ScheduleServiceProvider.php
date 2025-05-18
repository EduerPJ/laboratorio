<?php

namespace App\Providers;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;

class ScheduleServiceProvider extends ServiceProvider
{
    public function boot(Schedule $schedule): void
    {
        $schedule->command('app:report-payments')
            ->everyMinute()
            ->appendOutputTo(storage_path('logs/report-payments.log'));
    }
}

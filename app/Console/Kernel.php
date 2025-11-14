<?php

namespace App\Console;

use \Log;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Exécuter toutes les heures
        $schedule->command('publicites:update-status')
            ->hourly()
            ->withoutOverlapping()
            ->onSuccess(function () {
                Log::info('Mise à jour des statuts des publicités réussie');
            })
            ->onFailure(function () {
                Log::error('Échec de la mise à jour des statuts des publicités');
            });

        // Ou quotidiennement à minuit
        // $schedule->command('publicites:update-status')->daily();

        // Ou toutes les 30 minutes
        // $schedule->command('publicites:update-status')->everyThirtyMinutes();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
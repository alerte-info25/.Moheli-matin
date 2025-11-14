<?php

namespace App\Console\Commands;

use App\Models\Publicite;
use Illuminate\Console\Command;

class UpdatePubliciteStatus extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'publicites:update-status';

    /**
     * The console command description.
     */
    protected $description = 'Met à jour automatiquement le statut des publicités expirées';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = now();

        $expired = Publicite::where('status', 'active')
            ->whereNotNull('end_date')
            ->where('end_date', '<', $now)
            ->update(['status' => 'expiré']);

        $this->info("{$expired} publicité(s) marquée(s) comme expirée(s).");

        $activated = Publicite::where('status', 'inactive')
            ->whereNotNull('start_date')
            ->where('start_date', '<=', $now)
            ->where(function ($query) use ($now) {
                $query->whereNull('end_date')
                    ->orWhere('end_date', '>=', $now);
            })
            ->update(['status' => 'active']);

        $this->info("{$activated} publicité(s) activée(s) automatiquement.");

        return Command::SUCCESS;
    }
}
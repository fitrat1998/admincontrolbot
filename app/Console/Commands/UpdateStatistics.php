<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\StatisticsController;

class UpdateStatistics extends Command
{
    protected $signature = 'update:statistics';
    protected $description = 'Update bot statistics';

    public function handle()
    {
        app(StatisticsController::class)->index();
        $this->info('Bot statistics updated successfully!');
    }
}

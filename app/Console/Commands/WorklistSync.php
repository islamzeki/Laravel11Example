<?php

namespace App\Console\Commands;

use App\Services\Worklist\Factory\WorklistFactory;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;

class WorklistSync extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:worklist-sync {provider : WL Provider}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        WorklistFactory::create($this->argument('provider'))->save();
    }

    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'provider' => 'Provider is required!',
        ];
    }
}

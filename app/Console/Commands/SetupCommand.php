<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'metracker:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets up the meTracker app';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Creating pharmacist role...');
        $this->call('permission:create-role', [
            'name' => 'pharmacist'
        ]);

        $this->info('Creating admin role...');
        $this->call('permission:create-role', [
            'name' => 'admin'
        ]);

        $this->info('Creating patient role...');
        $this->call('permission:create-role', [
            'name' => 'patient'
        ]);
    }


}

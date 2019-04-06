<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;

class GenerateTestData extends Command
{
    protected $signature = 'data:generate {driver}';
    protected $description = 'Generates test data in a database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $driverName = $this->argument('driver');
        $driverNameLower = strtolower(trim($driverName));

        $connectionName = 'data-' . $driverNameLower;
        $connection = config('database.connections.' . $connectionName);

        if ($connection == null)
            throw new Exception("No connection was set for the '$driverName' driver.");

        $this->info("Generates test data for the '$driverName' driver.");
        $this->info('');

        $this->info('1. Running migrations.');
        $this->call('migrate', ['--database' => $connectionName]);
        $this->info('');

        $this->info('2. Running seed.');
        $this->call('db:seed', ['--database' => $connectionName]);
        $this->info('');

        $this->info('Success!');
    }
}

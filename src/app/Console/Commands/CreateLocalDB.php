<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PDO;

class CreateLocalDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:localdb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $dbName = config('database.connections.mysql.database');
        $dbh = new PDO(
            "mysql:host=" . config('database.connections.mysql.host'),
            config('database.connections.mysql.username'),
            config('database.connections.mysql.password')
        );
        $dbh->exec("DROP DATABASE IF EXISTS " . $dbName);
        $dbh->exec("CREATE DATABASE IF NOT EXISTS " . $dbName . " CHARACTER SET " . config('database.connections.mysql.charset') . " COLLATE " . config('database.connections.mysql.collation') . ";");
        $dbh->exec("CREATE schema IF NOT EXISTS localdb_statistic COLLATE utf8_general_ci;");
    }
}

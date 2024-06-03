<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class backupdb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:backupdb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menjalankan Backup Database';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST');
        $backupPath = storage_path('backupSQL/' . $database . '_' . date('Ymd_His') . '.sql');

        // Membuat direktori backup jika belum ada
        if (!Storage::exists('backupSQL')) {
            Storage::makeDirectory('backupSQL');
        }

        $command = sprintf(
            'mysqldump --user=%s --password=%s --host=%s %s > %s',
            escapeshellarg($username),
            escapeshellarg($password),
            escapeshellarg($host),
            escapeshellarg($database),
            escapeshellarg($backupPath)
        );

        $result = null;
        $output = null;
        exec($command, $output, $result);

        if ($result === 0) {
            $this->info('Backup Database Selesai.');
        } else {
            $this->error('Backup Database Gagal.');
        }
    }
}

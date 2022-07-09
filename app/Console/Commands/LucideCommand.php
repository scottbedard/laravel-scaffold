<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use ZipArchive;

class LucideCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:lucide';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update icon set';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line('Downloading...');
        File::put(resource_path('lucide.zip'), HTTP::get('https://github.com/lucide-icons/lucide/archive/refs/heads/main.zip')->body());

        $this->line('Unzipping...');
        $zip = new ZipArchive();
        $zip->open(resource_path('lucide.zip'));
        $zip->extractTo(resource_path('lucide'));
        $zip->close();

        $this->line('Copying...');
        File::copyDirectory(resource_path('lucide/lucide-main/icons'), resource_path('icons'));

        $this->line('Cleaning up...');
        File::delete(resource_path('lucide.zip'));
        File::deleteDirectory(resource_path('lucide'));

        $this->info('Done!');

        return 0;
    }
}

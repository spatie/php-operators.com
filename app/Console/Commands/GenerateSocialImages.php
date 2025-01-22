<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Spatie\Browsershot\Browsershot;
use Spatie\Sheets\Facades\Sheets;

class GenerateSocialImages extends Command
{
    protected $signature = 'app:generate-social-images {--force}';
    protected $description = 'Generates all social images';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        File::ensureDirectoryExists(public_path('og'));

        $operators = Sheets::all();

        $this->getOutput()->progressStart($operators->count());

        foreach ($operators as $operator) {
            $this->getOutput()->progressAdvance();

            $path = public_path("og/{$operator->slug}.png");

            if (File::exists($path) && ! $this->option('force')) {
                continue;
            }

            $html = view('og', [
                'title' => $operator->title,
                'teaser' => $operator->teaser,
                'contents' => $operator->contents,
            ])->render();

            Browsershot::html($html)
                ->windowSize(1200, 630)
                ->format('png')
                ->save($path);
        }

        $this->getOutput()->progressFinish();
    }
}

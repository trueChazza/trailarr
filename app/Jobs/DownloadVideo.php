<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use romanzipp\QueueMonitor\Traits\IsMonitored;
use YoutubeDl\Options;
use YoutubeDl\YoutubeDl;

class DownloadVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, IsMonitored;

    private string $key;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        (new YoutubeDl)->download(
            Options::create()
                ->downloadPath('/var/www/html/storage/app/videos')
                ->url("https://www.youtube.com/watch?v=$this->key")
                ->output('%(title)s.%(ext)s')
        );
    }
}

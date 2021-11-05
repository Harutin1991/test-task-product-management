<?php

namespace App\Jobs;

use App\Libs\FileUploader\Uploader;
use App\Models\ML\Site;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;

/*
 *
 */
class ParseCsvSites implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    protected string $filePath;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Uploader $uploader)
    {
        $chunks = csv_to_array($this->filePath, [
            'chunk' => 1000,
            'select' => 'domain'
        ]);

        foreach ($chunks as $chunk) {
            Site::query()->upsert($chunk, ['domain']);
        }

        $uploader->setDiskKey(\ConstStorageDisks::LOCAL)
            ->delete($this->filePath);
    }
}

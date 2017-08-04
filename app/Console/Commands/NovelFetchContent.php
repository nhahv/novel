<?php

namespace App\Console\Commands;

use App\Models\Chapter;
use App\Repositories\Snatch\TruyenYY;
use Illuminate\Console\Command;

class NovelFetchContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'novel:content {--F|force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch chapters contents of novels';

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
        $this->comment("Fetching Comments Chapters");
        
        $time_start = microtime(true);
        

        $query = Chapter::whereRaw('1 = 1');

        if (!$this->option('force')){
            $query->whereNull('content');
        }


        $chapterChunks = $query->get()->toArray();
        
        $truyenYY = new TruyenYY();
//        foreach ($chapterChunks as $chapters) {
            $truyenYY->getChaptersContents($chapterChunks);
//        }

        
        $count = count($chapterChunks);
        
        $time_end = microtime(true);
        
        $execution_time = ($time_end - $time_start)/60;
        
        $this->line("Fetched $count chapters in $execution_time minutes");
        
    }
}

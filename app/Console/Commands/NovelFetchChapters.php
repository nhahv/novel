<?php

namespace App\Console\Commands;

use App\Models\Novel;
use App\Repositories\Snatch\TruyenYY;
use Illuminate\Console\Command;
use PhpParser\Comment;

class NovelFetchChapters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'novel:fetch {--F|force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch chapters of novels';

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
//        
        $query = Novel::whereRaw('1 = 1');
        
        if (!$this->option('force')){
            $query->whereIsOver('false');
        }
        
        $novels = $query->get();
        
//        $novels = Novel::whereId(259)->get();

        //TODO Make queue
        $truyenYY = new TruyenYY();        
        foreach ($novels as $novel) {
            $truyenYY->getChapters($novel);
        }
        
    
    }
}

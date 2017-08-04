<?php

namespace App\Console\Commands;

use App\Models\Novel;
use App\Repositories\Snatch\TruyenYY;
use Illuminate\Console\Command;

class NovelInfoUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'novel:info {--limit=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update novel detail info';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    
    private $limit = null;
    
    private $engine = null;
    
    public function __construct()
    {
        parent::__construct();  
        $this->engine = new TruyenYY();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->limit = $this->option('limit');
        $novelQueryBuilder = Novel::whereDescription(null);
        if ($this->limit){
            $novelQueryBuilder->limit($this->limit);
        }
        $novels = $novelQueryBuilder->get();
        foreach ($novels as $novel) {

            $novel = $this->engine->getNovelInfo($novel);

            if ($novel){
                dump($novel->getDirty(),$novel->toArray());
            }

        }
    }
}

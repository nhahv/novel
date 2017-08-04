<?php

use App\Models\Novel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use App\Repositories\Snatch\Biquge;

class OverNovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dtStart = microtime_float();
        $overNovels = Novel::over()->where('id', '>', 0)->get();
        foreach($overNovels as $novel){
            Log::info("Start collect novel [$novel->id]:[$novel->name]");
            Biquge::updateNew($novel);
            Log::info("Update finished [$novel->id]:[$novel->name]");
        }
        $overEnd = microtime_float();
        echo "The full novel has been updated\n";
        echo "Time elapsed：". ($overEnd-$dtStart)." secs\n";
    }
}

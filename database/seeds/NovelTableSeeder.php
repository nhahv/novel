<?php

use App\Models\Category;
use App\Models\Novel;
use App\Repositories\Snatch\TruyenYY;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Repositories\Snatch\Biquge;

class NovelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dtStart = microtime_float();
        $truyenyy = new TruyenYY();

        /**
         * Fetchings categories
         * $truyenyy = new TruyenYY();    
         */

       /* 
       $categories = $truyenyy->getCategoriesList();
        $sort       = 0;
        foreach ($categories as $id => $cat) {
            $sort++;
            Category::firstOrCreate([
                'id'   => $id,
                'name' => $cat,
                'slug' => str_slug($cat),
                'sort' => $sort,
            ]);
        }
        $this->command->line('Fetched ' . Category::count() . ' categories');
       */


        /**
         * Fetchings categories infos
         * unset($categories);
         * $categories = Category::all();
         * foreach ($categories as $cat) {
         * $this->command->line('Get max page for category: ' .$cat->name. ' (' . $cat->id .')');
         * $max_page = $truyenyy->getCategoryMaxPage($cat->id);
         * $cat->max_page = $max_page; $cat->save();
         * }
         */

//        DB::table('novel')->truncate();
        
//        $categories = Category::all();
////        $categories = [Category::find(22)];
//        foreach ($categories as $category) {
//            $this->getNovelListByCategory($category);
//        }


        
        $novels = Novel::where('updated_at', '<' , Carbon::now()->addDays(-3))->get();
        foreach ($novels as $novel) {
            $novel = $truyenyy->getNovelInfo($novel);
            if ($novel){
                $novel->save();
            }
            
        }

        $initEnd = microtime_float();
        echo "OK\n";
        echo "Finished：" . ($initEnd - $dtStart) . " secs\n";
    }


    private function getNovelListByCategory(Category $category)
    {
        $truyenyy = new TruyenYY();
        for ($page = 1; $page <= $category->max_page; $page++){
            $novels = $truyenyy->getNovelListByCategory($category, $page);
            dump($novels);
        }
    }

}

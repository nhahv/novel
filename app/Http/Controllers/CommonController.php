<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use App\Http\Requests;
use Illuminate\Support\Facades\Cache;

class CommonController extends Controller
{
    //
    protected $genres;

    /**
     * CommonController constructor.
     */
    public function __construct()
    {
        $HotNovels    = Cache::remember('HotNovels', 0, function () {
            return Novel::with('author')->hot()->take(8)->get();
        });

        $HotNovels = Novel::with('author')->hot()->take(8)->get();
        $genres       =
            Cache::remember('genres', 0, function () {
                return category_maps();
            });
        $this->genres = $genres;
        view()->composer(['common.right', 'common.navbar'], function ($view) use ($HotNovels, $genres) {
            $view->with('HotNovels', $HotNovels)->with('genres', $genres);
        });
    }
}

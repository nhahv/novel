<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableNovelTempCrawlData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('novel', function (Blueprint $t) {
            $t->string('temp_genre');
            $t->string('temp_author');
            $t->integer('max_chapter');
            $t->integer('chapter_page');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('novel', function (Blueprint $t) {
            $t->dropColumn('temp_genre');
            $t->dropColumn('temp_author');
            $t->dropColumn('max_chapter');
            $t->dropColumn('chapter_page');
        });
    }
}

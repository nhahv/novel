<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Novel
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $author_id
 * @property string $type
 * @property string $cover
 * @property integer $hot
 * @property integer $sort
 * @property boolean $is_over
 * @property string $source
 * @property string $source_link
 * @property integer $chapter_num
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read \App\Models\Author $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Chapter[] $chapter
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereAuthorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereCover($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereHot($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereSort($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereIsOver($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereSource($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereSourceLink($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereChapterNum($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel continued()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel over()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel top()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel hot()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel latest()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel weekHot()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel monthHot()
 * @mixin \Eloquent
 * @property string $temp_genre
 * @property string $temp_author
 * @property integer $max_chapter
 * @property integer $chapter_page
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereTempGenre($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereTempAuthor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereMaxChapter($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Novel whereChapterPage($value)
 */
class Novel extends Model
{
    protected $table = 'novel';
    protected $fillable = ['name', 'description', 'author_id', 'type', 'cover', 'hot', 'sort', 'is_over', 'source', 'source_link', 'chapter_num'];

    //
    public function tags()
    {
    	return $this->belongsToMany('App\Models\Tag', 'novel_tag');
    }

    public function author()
    {
    	return $this->belongsTo('App\Models\Author');
    }

    public function chapter()
    {
    	return $this->hasMany('App\Models\Chapter')->orderBy('id');
    }

    //该小说订阅用户
    public function user()
    {
    	return $this->belongsToMany(User::class, 'user_novel');
    }

    public function scopeContinued($query)
    {
        return $query->where('is_over', '=', 0);
    }

    public function scopeOver($query)
    {
        return $query->where('is_over', '=', 1);
    }

    public function scopeTop($query)
    {
        return $query->orderBy('sort', 'desc');
    }

    //热门
    public function scopeHot($query)
    {
        return $query->orderBy('hot', 'desc');
    }

    //最新
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    //周热门
    public function scopeWeekHot($query)
    {
        return $query->whereExists(function ($query) {
            $query
                ->leftJoin('chapter', 'novel.id', '=', 'chapter.novel_id')
                ->select(DB::raw('count(views) as views'))
                ->from('chapter')
                ->whereRaw('chapter.novel_id=novel.id');
            })
            ->take(8);
    }

    //月热门
    public function scopeMonthHot($query)
    {
        return $query->take(8);
    }
}

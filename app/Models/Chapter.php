<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Chapter
 *
 * @property integer $id
 * @property integer $novel_id
 * @property string $name
 * @property string $content
 * @property integer $views
 * @property string $source_link
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Novel $novel
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Chapter whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Chapter whereNovelId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Chapter whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Chapter whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Chapter whereViews($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Chapter whereSourceLink($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Chapter whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Chapter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Chapter extends Model
{
    protected $table = 'chapter';
    protected $fillable = ['name', 'novel_id', 'content', 'views', 'source_link'];
    //
    public function novel()
    {
    	return $this->belongsTo(Novel::class);
    }
}

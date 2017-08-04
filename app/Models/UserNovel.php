<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserNovel
 *
 * @property integer $user_id
 * @property integer $novel_id
 * @property string $subscribe_time
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserNovel whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserNovel whereNovelId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserNovel whereSubscribeTime($value)
 * @mixin \Eloquent
 */
class UserNovel extends Model
{
    //
    protected $table = 'user_novel';
    public $timestamps = false;

    protected $fillable =['user_id', 'novel_id'];
}

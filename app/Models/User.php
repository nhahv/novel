<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User
 *
 * @property integer $id
 * @property string $open_id
 * @property string $nickname
 * @property boolean $is_subscribe
 * @property integer $push_time
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Novel[] $novel
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereOpenId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereNickname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereIsSubscribe($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User wherePushTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Model
{
    protected $table = 'user';

    protected $fillable =['open_id', 'nickname', 'is_subscribe', 'push_time'];
    
    //所有的订阅小说
    public function novel()
    {
    	return $this->belongsToMany(Novel::class, 'user_novel');
    }
}

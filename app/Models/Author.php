<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Author
 *
 * @property integer $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Novel[] $novel
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Author whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Author whereName($value)
 * @mixin \Eloquent
 */
class Author extends Model
{
    //
    protected $table = 'author';
    protected $fillable = ['name'];
    public $timestamps = false;


    public function novel()
    {
    	return $this->hasMany(Novel::class);
    }
}

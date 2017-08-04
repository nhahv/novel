<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tag
 *
 * @mixin \Eloquent
 */
class Tag extends Model
{
    //
    public function novel()
    {
    	return $this->belongToMany(Novel::class);
    }
}

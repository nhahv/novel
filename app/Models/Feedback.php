<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Feedback
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property string $name
 * @property string $email
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Feedback whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Feedback extends Model
{
    //
    protected $table = 'feedback';
    protected $fillable = ['title', 'url', 'name', 'email', 'content'];
}

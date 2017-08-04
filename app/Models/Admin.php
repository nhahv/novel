<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\Admin
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Admin whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Admin whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Admin whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Admin wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Admin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Admin extends Authenticatable
{
    protected $table = 'admin';

    protected $fillable = ['username', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];
}

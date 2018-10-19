<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'introduction', 'avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function topics()
    {
        return $this->hasMany(Topic::class);//一对多的关系
    }

    public function isAuthOf($model)
    {
        return $this->id == $model->user_id;
    }
}

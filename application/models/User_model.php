<?php

use Illuminate\Database\Eloquent\Model;

class User_model extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'nama',
        'username',
        'password',
        'remember_token',
    ];
}

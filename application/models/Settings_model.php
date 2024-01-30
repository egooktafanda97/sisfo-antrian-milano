<?php


use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $table = 'settings';
    protected $fillable = [
        'key',
        'values',
        'status',
    ];
}

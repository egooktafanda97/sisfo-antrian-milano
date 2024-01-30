<?php

use Illuminate\Database\Eloquent\Model;

class Galery_model extends Model
{

    protected $table = 'galery';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'tanggal',
        'jenis_media',
        'path',
    ];

    protected $casts = [
        'tanggal' => 'datetime',
    ];

    // Jika diperlukan, Anda juga dapat menambahkan relasi atau metode lain di sini.
}

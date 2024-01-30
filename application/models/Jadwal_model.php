<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Jadwal_model extends Eloquent
{

    protected $table = 'pengaturan_jadwal';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'hari',
        'buka',
        'tutup',
        'tanggal',
        'status',
    ];

    protected $casts = [
        'buka' => 'date',
        'tutup' => 'date',
    ];

    // Jika diperlukan, Anda juga dapat menambahkan relasi atau metode lain di sini.
}

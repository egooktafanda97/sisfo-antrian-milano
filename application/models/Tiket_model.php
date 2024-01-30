<?php

use Illuminate\Database\Eloquent\Model;

class Tiket_model extends Model
{

    protected $table = 'tiket';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'tanggal',
        'harga',
        'keterangan',
        'jumlah_tiket',
        'status',
    ];
}

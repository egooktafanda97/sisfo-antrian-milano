<?php


use Illuminate\Database\Eloquent\Model;

class Jadwal_model extends Model
{
    protected $table = 'jadwal_dokter';

    protected $fillable = [
        'dokter_id',
        'bagian',
        'hari_pertama',
        'hari_terakhir',
        'jam_pertama',
        'jam_terakhir',
    ];
}

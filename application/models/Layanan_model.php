<?php


use Illuminate\Database\Eloquent\Model;

class Layanan_model extends Model
{
    protected $table = 'layanan';

    protected $fillable = [
        'nama',
        'layanan_medis',
        'info_medis',
        'code_layanan',
    ];
}

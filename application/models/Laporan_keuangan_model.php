<?php

use Illuminate\Database\Eloquent\Model;

class Laporan_keuangan_model extends Model
{

    protected $table = 'laporan_keuangan';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'tanggal',
        'jenis_pemasukan',
        'jumlah_pemasukan',
        'jenis_pengeluaran',
        'jumlah_pengeluaran',
    ];

    protected $casts = [
        'tanggal' => 'datetime',
    ];

    // Jika diperlukan, Anda juga dapat menambahkan relasi atau metode lain di sini.
}

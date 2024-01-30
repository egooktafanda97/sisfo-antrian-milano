<?php

// application/models/Pembelian_model.php

use Illuminate\Database\Eloquent\Model;

class Laporan_keuangan_model extends Model
{

    protected $table = 'pembelian';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'jadwal_id',
        'tiket_id',
        'tanggal',
        'qr_code',
        'harga',
        'jumlah_beli',
        'status_pembelian',
        'status',
    ];

    // Jika diperlukan, Anda juga dapat menambahkan relasi atau metode lain di sini.

    // Contoh relasi dengan tabel 'user'
    public function user()
    {
        return $this->belongsTo('User_model', 'user_id', 'id');
    }

    // Contoh relasi dengan tabel 'jadwal'
    public function jadwal()
    {
        return $this->belongsTo('Jadwal_model', 'jadwal_id', 'id');
    }

    // Contoh relasi dengan tabel 'tiket'
    public function tiket()
    {
        return $this->belongsTo('Tiket_model', 'tiket_id', 'id');
    }
}

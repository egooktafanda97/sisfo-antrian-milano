<?php

use Illuminate\Database\Eloquent\Model;

class Karyawan_model extends Model
{

    protected $table = 'karyawan';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'jenis_kelamin',
        'jabatan',
        'tugas',
    ];

    // Jika diperlukan, Anda juga dapat menambahkan relasi atau metode lain di sini.

    // Contoh relasi dengan tabel 'user'
    public function user()
    {
        return $this->belongsTo('User_model', 'user_id', 'id');
    }
}

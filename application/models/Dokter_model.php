<?php


use Illuminate\Database\Eloquent\Model;

class Dokter_model extends Model
{
    protected $table = 'tb_dokter'; // Gantilah 'nama_tabel' dengan nama tabel yang sesuai

    // protected $fillable = [
    //     'kode_dokter',
    //     'nama_dokter',
    //     'tempat_lahir',
    //     'tanggal_lahir',
    //     'alamat',
    //     'jenis_kelamin',
    //     'status',
    //     'pendidikan_akhir',
    //     'layanan_id',
    // ];

    // Defaultnya, Eloquent mengasumsikan bahwa kolom id adalah primary key dan auto-increment
    // Jika kolom primary key atau nama tabel berbeda, Anda dapat menyesuaikannya sebagai berikut:
    // protected $primaryKey = 'id';
    // protected $keyType = 'int';
    // public $incrementing = true;

    // Defaultnya, Eloquent mengasumsikan bahwa timestamp kolom adalah 'created_at' dan 'updated_at'
    // Jika nama kolom timestamp berbeda, Anda dapat menyesuaikannya sebagai berikut:
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
}

<?php

// application/models/Tentang_model.php

use Illuminate\Database\Eloquent\Model;

class Tentang_model extends Model
{

    protected $table = 'tentang';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'tentang',
        'sejarah',
        'peta',
    ];

    // Jika diperlukan, Anda juga dapat menambahkan relasi atau metode lain di sini.
}

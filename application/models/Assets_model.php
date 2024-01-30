<?php

// application/models/Asset_model.php

use Illuminate\Database\Eloquent\Model;

class Assets_model extends Model
{

    protected $table = 'assets';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'jenis_asset',
        'nama_asset',
        'jumlah',
        'status',
    ];
}

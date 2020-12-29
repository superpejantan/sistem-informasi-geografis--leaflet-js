<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farmer_group extends Model
{
    protected $table = 'farmer_group';
    public $primaryKey = 'code';

    public $timestamps = true;


    public $fillable = [
    	'code',
        'code_desa',
        'komoditas',
        'nama_kelompok',
        'ketua',
        'sekretaris',
        'bendahara',
        'penyuluh',
    	'nama',
    	'jumlah_anggota',
    	'longtitude',
    	'latitude'
    ];

    public function desa()
    {
        return $this->beLongsTo('App\Models\Village','code_desa','code_desa');
	}


   
}

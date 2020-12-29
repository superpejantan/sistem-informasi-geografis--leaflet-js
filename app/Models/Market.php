<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $table = "tb_market";
    public $timestamps = true;

    protected $fillable = [
    	'id',
    	'code',
    	'nama_pasar',
    	'lokasi',
    	'latitude',
    	'longtitude'
    ];

}

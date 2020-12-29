<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class village extends Model
{
    protected $table = "tb_desa";
    public $timestamps = true;

    protected $fillable = [
        'id',
        'code',
    	'desa',
    	'luas',
    	'longtitude',
    	'latitude',
        'no_telepon'
    ];

    public function Farmergroup()
    {
        return $this->hasOne('App/Models/Farmer_group', 'code_desa');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comodity extends Model
{
   protected $table = "tb_comodity";
    public $timestamps = true;

    protected $fillable = [
    	'id_comodity',
    	'komoditas',
    	'jenis',
    ];
}

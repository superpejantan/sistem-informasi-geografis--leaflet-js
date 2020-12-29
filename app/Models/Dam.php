<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dam extends Model
{
    protected $table = "tb_dam";
	public $timestamps = true;
	protected $primaryKey = 'id';

    protected $fillable = [
    	'code',
    	'code_desa',
    	'keterangan',
    	'longtitude',
		'latitude',
		'lokasi',
    	'path',
    	'title'
    ];
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
   protected $table = "tb_activity";
   protected $primaryKey = "id";
   
	public $timestamps = true;
	

    protected $fillable = [
    	'id',
    	'code',
    	'code_desa',
        'code_kelompok',
    	'keterangan',
    	'longtitude',
    	'latitude',
		'path',
		'tanggal_pelaksanaan',
    	
	];
	public function desa()
    {
        return $this->beLongsTo('App\Models\Village','code_desa','code_desa');
	}

	public function farmer()
	{
		return $this->belongsTo('App\Models\Farmer_group','code_kelompok','code');
	} 
}

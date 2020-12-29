<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
	protected $table = "tb_harvest";
	protected $primaryKey = 'code_harvest';
	public $timestamps = true;
	

    protected $fillable = [
		'code_comodity',
		'code_harvest',
    	'product',
		'code_desa',
		'id_comodity',
    	'luas_tanam',
    	'luas_panen',
        'dusun',
    	'produktivitas(kw/ha)',
    	'produksi(ton)',
    	'latitude',
    	'longtitude'
	];
	
	public function desa()
    {
        return $this->beLongsTo('App\Models\Village','code_desa','code_desa');
	}

	public function farmer()
	{
		return $this->belongsTo('App\Models\Farmer_group','code_farmer','code');
	} 

	public function comodity()
	{
		return $this->belongsTo('App\Models\Comodity','id_comodity','id_comodity');
	} 
}

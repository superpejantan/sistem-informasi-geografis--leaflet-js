<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    protected $table = "users";
    public $timestamps = true;

    protected $fillable = [
    	'id',
    	'code',
    	'no_induk',
    	'name',
    	'jabatan',
    	'alamat',
    	'no_telepon',
		'email',
		'password'
    ];
}

<?php

namespace app\Helper;
use App\Models\Comodity;
use App\Models\village;
use App\Models\Dam;
use App\Models\Harvest;
use App\Models\Store;
use App\Models\Farmer_group;
use App\Models\Market;
use App\Models\Official;
use App\Models\Fruit_vegetable;
use App\Models\Activity;

class Helper
{
	
	public static function CodeVillage()
	{
		$cek = village::latest()->first();
            if(!is_null($cek)){
                $code = $cek->code;
                $number = (int) substr($code, 3, 3);
                $number++;
                $char = "vlg";
                $codeGenerate = $char . sprintf("%03s", $number);
             } else{
                $codeGenerate = "vlg001";
            }
                return $codeGenerate;
	}

    public static function CodeFarmerGroup()
    {
        $cek = Farmer_group::latest()->first();
            if(!is_null($cek)){
                $code = $cek->code;
                $number = (int) substr($code, 3,3);
                $number++;
                $char = "cfg";
                $codeGenerate = $char . sprintf("%03s", $number);
            }else {
                $codeGenerate = "cfg001";
            }
            return $codeGenerate;
    }

    public static function codeOfficial()
    {
        $cek = official::latest()->first();
        
            if(!is_null($cek)){
                $code = $cek->code;
                $number = (int) substr($code, 3, 3);
                $number++;
                $char = "ofc";
                $codeGenerate = $char . sprintf("%03s", $number);
             } else{
                $codeGenerate = "ofc001";
            }
                return $codeGenerate;
    }

    public static function codeStore()
    {
        $cek = Store::latest()->first();
            if(!is_null($cek))
            {
                $code = $cek->code_store;
                $number = (int) substr($code, 3,3 );
                $number++;
                $char = 'cst';
                $codeGenerate = $char . sprintf('%03s', $number);
            } else{
                $codeGenerate = 'cst001';
            }
            return $codeGenerate;
    }
     public static function codeDam()
    {
        $cek = Dam::latest()->first();
            if(!is_null($cek))
            {
                $code = $cek->code_bendungan;
                $number = (int) substr($code, 3,3 );
                $number++;
                $char = 'dam';
                $codeGenerate = $char . sprintf('%03s', $number);
            } else{
                $codeGenerate = 'dam001';
            }
            return $codeGenerate;
    }

    public static function codeHarvest()
    {
        $cek = Harvest::latest()->first();
            if(!is_null($cek))
            {
                $code = $cek->code;
                $number = (int) substr($code, 3,3 );
                $number++;
                $char = 'hrv';
                $codeGenerate = $char . sprintf('%03s', $number);
            } else{
                $codeGenerate = 'hrv001';
            }
            return $codeGenerate;
    }

    public static function codeFruitVegetable()
    {
        $cek = Fruit_vegetable::latest()->first();
            if(!is_null($cek))
            {
                $code = $cek->code_fruit_vegan;
                $number = (int) substr($code, 3,3 );
                $number++;
                $char = 'cfv';
                $codeGenerate = $char . sprintf('%03s', $number);
            } else{
                $codeGenerate = 'cfv001';
            }
            return $codeGenerate;
    }

    public static function codeComodity()
    {
        $cek = Comodity::latest()->first();
            if(!is_null($cek))
            {
                $code = $cek->id_comodity;
                $number = (int) substr($code, 3,3 );
                $number++;
                $char = 'cmd';
                $codeGenerate = $char . sprintf('%03s', $number);
            } else{
                $codeGenerate = 'cmd001';
            }
            return $codeGenerate;
    }

    public static function codeActivity()
    {
        $cek = Activity::latest()->first();
            if(!is_null($cek))
            {
                $code = $cek->id_comodity;
                $number = (int) substr($code, 3,3 );
                $number++;
                $char = 'act';
                $codeGenerate = $char . sprintf('%03s', $number);
            } else{
                $codeGenerate = 'act001';
            }
            return $codeGenerate;
    }
    public static function codeMarket()
    {
        $cek = Market::latest()->first();
            if(!is_null($cek))
            {
                $code = $cek->code;
                $number = (int) substr($code, 3,3 );
                $number++;
                $char = 'mkt';
                $codeGenerate = $char . sprintf('%03s', $number);
            } else{
                $codeGenerate = 'mkt001';
            }
            return $codeGenerate;
    }
}
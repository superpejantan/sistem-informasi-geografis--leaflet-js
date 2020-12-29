<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Harvest;
use App\Models\Comodity;
use App\Models\Village;
use App\Models\Dam;
use App\Models\Farmer_group;
use App\Helper\Helper;
use yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Schema;

class HarvestController extends Controller
{
    public function index()
    {
		$Food = Harvest::join('tb_desa','tb_harvest.code_desa','tb_desa.code_desa')
						 ->join('tb_comodity','tb_harvest.id_comodity', 'tb_comodity.id_comodity')
						 ->join('farmer_group','tb_harvest.code_farmer','farmer_group.code')->get();
        $Comodity = Comodity::all();
		$Village = Village::all();
		$Farmer = Farmer_group::all();


    	$Datas = [
    		'harvests' => $Food,
            'villages' => $Village,
			'comodity' => $Comodity,
			'farmers'   => $Farmer,
    		'title' => 'Data Hasil Produksi Pertanian'
    	];

    	return view('backend.admin.harvest', $Datas);
    }	

    public function input(Request $request)
    {
    	$id = $request->id;

    	if($id){
    		$Data = Harvest::find($id);
    	}else{
    		$Data = new Harvest();
    		$Data->code_harvest= Helper::codeHarvest();
			}

			$Data->id_comodity = $request->komoditas;
			$Data->code_desa = $request->desa;
			$Data->code_farmer = $request->farmer;
			$Data->produk = $request->produk;
			$Data->luas_tanam = $request->luas;
			$Data->luas_panen = $request->panen;
			$Data->produktivitas_kw_ha = $request->kwintal;
			$Data->produksi_ton = $request->ton;
			$Data->latitude = $request->latitude;
			$Data->longtitude = $request->longtitude;
			$Data->save(); 

			return redirect()->back();
	}
	
	public function get_harvest($code)
    {
        $Data = Harvest::find($code);

        return response()->json([
            'id' => $Data->id,
			'komoditas'=> $Data->komoditas,
			'kelompok' => $Data->code_farmer,
			'desa'=> $Data->code_desa,
			'produk'=> $Data->produk,
			'luas'=> $Data->luas_tanam,
			'panen'=> $Data->luas_panen,
			'kwintal'=> $Data->produktivitas_kw_ha,
			'ton'=> $Data->produksi_ton,
            'longtitude' => $Data->harvest_longtitude,
            'latitude' => $Data->harvest_latitude
        
        ]);
    }

    public function delete($code)
    {
		//dd($id);

		$Data = Harvest::find($code);
		
		dd($Data);

        $Data->delete();
        return redirect()->back();
    }
}

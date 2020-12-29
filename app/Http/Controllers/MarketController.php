<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Market;
use App\Helper\Helper;
use Illuminate\Support\Facades\Schema;


class MarketController extends Controller
{
    public function index()
    {
    	$Market = Market::all();

    	$Data =[
    		'market' => $Market,
    		'title' => 'Lokasi Pasar'
    	];

    	return view('backend.admin.market', $Data);
    }

    public function input(Request $request)
    {
    	$id = $request->id;
    	if($request->hasFile('image')){
            $resorce       = $request->file('image');
            $path   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() ."/public/foto/Market", $path);
        }else if($id){
            $data = Market::find($id);
        }

    	else{
    		$data = new Market;
            $data->code =Helper::codeMarket();
        }
    
            
            $data->nama_pasar = $request->nama;
            $data->lokasi = $request->lokasi;
            $data->latitude = $request->latitude;
            $data->longtitude = $request->longtitude;
            $data->save();
        

        
        return redirect()->back();
    }

    public function get_market($id)
    {
    	$Data = Market::find($id);

    	return response()->json([
    		'id' => $Data->id,
    		'code' => $Data->code,
    		'nama' => $Data->nama_pasar,
    		'lokasi' => $Data->lokasi,
    		'latitude' => $Data->latitude,
    		'longtitude' => $Data->longtitude

    	]);
    }
    public function update(Request $request)
	{
		$id = $request->id;
		$foto = $request->hasFile('image');
		$resorce       = $request->file('image');
		$path   = $resorce->getClientOriginalName();
		$resorce->move(\base_path() ."/public/foto/market", $path);

		if($foto){
			$Data = Market::find($id);
			$Data->path = $request->path;
		}else{

			$Data = Market::find($id);
		}
			$file->code_desa = $request->desa;
			$file->code_kelompok = $request->kelompok;
			$file->longtitude = $request->longtitude;
			$file->latitude = $request->latitude;
			$file->keterangan = $request->keterangan;
            $file->save();
            
        return redirect()->back();
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dam;
use App\Models\jajal;
use App\Models\Village;
use App\Helper\Helper;
use yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use DB;
class DamController extends Controller
{
    public function index()
    {
    	$Dam = Dam::all();
        $Village = Village::all();

    	$Datas = [
    		'dam' => $Dam,
            'village' => $Village,
    		'title' => 'Daftar Bendungan'
    	];
    	return view('backend.admin.dam',$Datas);
    }

    public function input(Request $request)
    {
    	 
        if($request->hasFile('image')){
            $resorce       = $request->file('image');
            $path   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() ."/public/foto/Dam", $path);

            $data = new Dam;
            $data->code =Helper::codeDam();
            $data->code_desa = $request->desa;
            $data->lokasi = $request->lokasi;
            $data->keterangan = $request->keterangan;
            $data->latitude = $request->latitude;
            $data->longtitude = $request->longtitude;
            $data->path = $path;
            $data->save();
        }
        return redirect()->back();
    }

    public function get_Dam($id)
    {
        $Data = Dam::find($id);

        return response()->json([
            'longtitude' =>$Data->longtitude,
            'lokasi' =>$Data->lokasi,
            'latitude' =>$Data->latitude,
            'keterangan' =>$Data->keterangan,
            'desa'=>$Data->code_desa,
            'id' =>$Data->id

        ]);
    }

    public function update(Request $request)
	{
		$id = $request->id;
		$foto = $request->hasFile('image');
		$resorce       = $request->file('image');
		
		if($foto){
            $path   = $resorce->getClientOriginalName();
		    $resorce->move(\base_path() ."/public/foto/Dam", $path);

			$Data = Dam::find($id);
			$Data->path = $path;
		}else{

			$Data = Dam::find($id);
        }
            $Data->lokasi = $request->lokasi;
			$Data->code_desa = $request->desa;
			$Data->longtitude = $request->longtitude;
			$Data->latitude = $request->latitude;
			$Data->keterangan = $request->keterangan;
            $Data->save();
            
        return redirect()->back();
    }
    
    public function delete($id)
    {
        $Data = Dam::find($id);
        dd($Data);
        
        $Data->delete();
        return redirect()->back();
    }
}

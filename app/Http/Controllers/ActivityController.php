<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use App\Models\Activity;
use App\Models\Village;
use App\Models\Farmer_group;
use App\Helper\Helper;

class ActivityController extends Controller
{
    public function index()
    {
    	$Activity = Activity::all();
    	$Village = Village::all();
    	$Farmer_group = Farmer_group::all();

    	$Data = [
    		'data' => $Activity,
    		'village' => $Village,
    		'farmer' => $Farmer_group,
    		'title' => 'Kegiatan Pendampingan Pertanian'
    	];

    	return view('backend.admin.activity', $Data);
    }

     public function input(Request $request)
    {
    	 if($request->hasFile('image')){
            $resorce       = $request->file('image');
            $path   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() ."/public/foto/activity", $path);

	        $file = new Activity;
	        $file->path = $path;
	        $file->code = Helper::codeActivity();
			$file->code_desa = $request->desa;
			$file->latitude = $request->latitude;
			$file->longtitude = $request->longtitude;
	        $file->code_kelompok = $request->kelompok;
			$file->keterangan = $request->keterangan;
			$file->tanggal_pelaksanaan = $request->tanggal;
	        $file->save();
        
        }
        return redirect()->back();
	}
	
	public function update(Request $request)
	{
		$id = $request->id;
		$foto = $request->hasFile('image');
		$resorce       = $request->file('image');
		$path   = $resorce->getClientOriginalName();
		$resorce->move(\base_path() ."/public/foto/activity", $path);

		if($foto){
			$path   = $resorce->getClientOriginalName();
			$resorce->move(\base_path() ."/public/foto/activity", $path);
			$Data = Activity::find($id);
			$Data->path = $path;
		}else{

			$Data = Activity::find($id);
		}
			$Data->code_desa = $request->desa;
			$Data->code_kelompok = $request->kelompok;
			$Data->keterangan = $request->keterangan;
			$Data->latitude = $request->latitude;
			$Data->longtitude = $request->longtitude;
			$Data->tanggal_pelaksanaan = $request->tanggal;
			$Data->save();
	}

	public function get_activity($id)
	{
		$Data = Activity::find($id);

		return response()->json([
			'id' => $Data->id,
			'desa' => $Data->code_desa,
			'kelompok' => $Data->code_kelompok,
			'keterangan' =>$Data->keterangan,
			'tanggal'=>$Data->tanggal_pelaksanaan,
		]);
	}

	public function delete($id)
	{
		$Data = Activity::find($id);
		$Data->delete();

		return redirect()->back();
	}
}

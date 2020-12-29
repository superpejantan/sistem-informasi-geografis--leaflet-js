<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Official;
use App\Models\Village;
use App\Helper\Helper;
use Illuminate\Support\Facades\Storage;
use yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;


class OfficialController extends Controller
{
    public function index()
    {
    	$Official = Official::all();
        $Village = Village::all();

    	$Datas = [
    		'data' => $Official,
            'village' => $Village,
    		'title' => 'Data Pegawai Badan Penyuluhan Pertanian'
    	];
    	return view('backend.admin.official', $Datas);
    }

    public function input(Request $request)
    {
		$id = $request->id;
		//dd($id);
        if($id){
            $data = Official::find($id);
        }else{
        	$data = new Official;
        	$data->code = Helper::codeFarmerGroup();
        }if($request->hasFile('image')){
            $resorce       = $request->file('image');
            $path   = $resorce->getClientOriginalName();
			$resorce->move(\base_path() ."/public/foto/official", $path);
			$data->picture_path = $path;
		}
		
        	$data->name = $request->nama;
        	$data->no_induk = $request->code;
        	$data->jabatan = $request->jabatan;
        	$data->alamat = $request->alamat;
        	$data->no_telepon = $request->telepon;
			$data->email = $request->email;
			$data->password = Hash::make($request->password);
        	$data->save();
        	
            return redirect()->back();
	}
	
	public function get_official($id)
	{
		$Data = Official::find($id);

		return response()->json([
			'id' => $Data->id,
			'nama' => $Data->name,
			'no_induk' => $Data->no_induk,
			'jabatan' => $Data->jabatan,
			'alamat' => $Data->alamat,
			'no_telepon' => $Data->no_telepon,
			'email' => $Data->email,
			'password' => $Data->password
		]);
	}

	public function delete($id)
	{
		$Data = Official::find($id);
		$Data->delete();

		return redirect()->back();
	}
}

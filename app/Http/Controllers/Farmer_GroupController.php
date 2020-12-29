<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmer_group;
use App\Models\official;
use App\Models\village;
use App\Models\Comodity;
use Yajra\DataTables\DataTables;
use App\Helper\Helper;
use Illuminate\Support\Facades\DB;

class Farmer_GroupController extends Controller
{
    public function index()
    {
    	$Farmer= Farmer_group::get();
        $Village = village::all();
        $Official = official::all();
        $Comodity = Comodity::all();
    	$Datas = [
            'village' =>$Village,
            'official' =>$Official,
            'Comodity' =>$Comodity,
    		'title' => 'Data Kelompok Tani'
    	];
    	return view('backend.admin.groupfarmer', $Datas,['Farmer'=>$Farmer]);
    }

    public function input(Request $request)
    {
        $id = $request->id;
        //dd($id);
        if($id){
            $data = Farmer_group::find($id);
        }else{
        	$data = new Farmer_group;
        	$data->code = Helper::codeFarmerGroup();
        }

    	
        $data->nama_kelompok = $request->kelompok;
    	$data->dusun = $request->alamat;
        $data->tahun_berdiri = $request->tahun;
        $data->total_anggota = $request->jumlah;
        $data->komoditas_unggulan = $request->komoditas;
        $data->ketua = $request->ketua;
        $data->sekretaris = $request->sekretaris;
        $data->bendahara = $request->bendahara;
        $data->nama_penyuluh = $request->penyuluh;
    	$data->longtitude = $request->longtitude;
    	$data->latitude = $request->latitude;
    	$data->save();

    	return redirect()->back();
    }

    public function get_group($code)
    {
        $Data = Farmer_group::find($code);

        return response()->json([
            'id' => $Data->id,
            'code' => $Data->code,
            'desa' => $Data->code_desa,
            'nama' => $Data->nama_kelompok,
            'penyuluh' => $Data->name,
            'alamat' => $Data->dusun,
            'ketua' => $Data->ketua,
            'sekretaris' => $Data->sekretaris,
            'bendahara' => $Data->bendahara,
            'tahun' => $Data->tahun_berdiri,
            'jumlah' => $Data->total_anggota,
            'komoditas' => $Data->komoditas_unggulan,
            'longtitude' => $Data->longtitude,
            'latitude' => $Data->latitude
        
        ]);
    }

    public function delete($code)
    {
        //dd($code);
        $Data = Farmer_group::find($code);
        dd($Data);
        $Data->delete();
        return redirect()->back();
    }
}

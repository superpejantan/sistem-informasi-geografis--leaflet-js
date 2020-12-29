<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Village;
use App\Models\Harvest;
use App\Helper\Helper;
use App\Models\Comodity;
use Illuminate\Http\Session;

class VillageController extends Controller
{
    public function index()
    {
    	$Village = Village::all();
    	$Datas = [
    		'data'=>$Village,
            'title'=> 'Daftar Desa'
    	];

    	return view('backend.Admin.village', $Datas);
    }

    public function input( Request $request)
    {
        $id = $request->id;
        
        if($id){
            $data = Village::find($id);
        }else {
            $data = new vVllage();
            $data->code=Helper::codeVillage();

        }

        $data->desa = $request->desa;
        $data->luas = $request->luas;
        $data->jumlah_penduduk = $request->jumlah;
        $data->kepala_desa = $request->kepala;
        $data->longtitude = $request->longtitude;
        $data->latitude = $request->latitude;
        $data->no_telepon = $request->telepon;
        $data->save();


        try{
            $data->save();
            \Session::flash('sukses','absen masuk berhasil');
        } catch (\Exception $ex){
            \Session::flash('gagal',$e->getMessage());
        }

    	return redirect()->back();
    }

    public function update(Request $request)
    {
        $code = $request->id;
        $data = Village::find($code);
        $data->desa = $request->desa;
        $data->luas = $request->luas;
        $data->jumlah_penduduk = $request->jumlah;
        $data->kepala_desa = $request->kepala;
        $data->longtitude = $request->longtitude;
        $data->latitude = $request->latitude;
        $data->no_telepon = $request->telepon;
        $data->save();
        
        return redirect()->back();
    }

    public function get_Village($id)
    {
        $village = Village::where('id', $id)->first();

        return response()->json([
            'id'=>$village->id,
            'code'=>$village->code,
            'desa' =>$village->desa,
            'luas' =>$village->luas,
            'kepala_desa' =>$village->kepala_desa,
            'jumlah_penduduk' =>$village->jumlah_penduduk,
            'no_telepon' =>$village->no_telepon,
            'latitude' =>$village->latitude,
            'longtitude' =>$village->longtitude
        ]);

    }

    public function maps()
    {
        $Village = Village::all();
        $Comodity = Comodity::get();
        $Sayur = Harvest::where('id_comodity','cmd002')->count();
        $Buah = Harvest::where('id_comodity','cmd003')->count();
        $Pangan = Harvest::where('id_comodity','cmd001')->count();
        
        $Data = [
            'village' => $Village,
            'buah' => $Buah,
            'pangan' => $Pangan,
            'sayur' => $Sayur
        ];

        $comoditi = [];
            foreach($Comodity as $data =>$cm)
            {
                $comoditi[]= $cm->jenis;
            }
        return view('backend.layouts.content.index',$Data, ['comoditi'=>$comoditi]);
    }
    

     
}

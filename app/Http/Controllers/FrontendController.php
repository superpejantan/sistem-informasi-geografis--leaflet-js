<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dam;
use App\Models\Village;
use App\Models\Official;
use App\Models\Store;
use App\Models\Farmer_group;
use App\Models\Market;
use App\Models\Activity;
use App\Models\Harvest;

class FrontendController extends Controller
{
    public function index()
    {


        return view('Frontend.component.index');
    }

    public function Dam()
    {
    	$Dam = Dam::all();

    	$Data = [
    		'dam' => $Dam,
    		'title'=> 'Lokasi Bendungan'
    	];

    	return view('frontend.content.dam', $Data); 
    }

    public function village()
    {
    	$Village = Village::all();

    	$Data = [
    		'village' => $Village,
    		'title' => 'Wilayah Desa Di Kecamatan Takeran'
    	];

    	return view('frontend.content.village', $Data);
    }

    public function farmer()
    {
    	$Farmer = Farmer_group::all();

    	$Data = [
    		'farmer' => $Farmer,
    		'title' => 'Nama Kelompok Tani Di Kecamatan Takeran'
    	];

    	return view('frontend.content.farmer', $Data);
    }

    public function get_farmer($code)
    {
        $Data = Farmer_group::find($code);

        return response()->json([
            'id' => $Data->id,
            'code' => $Data->code,
            'desa' => $Data->code_desa,
            'dusun'=>$Data->dusun,
            'nama' => $Data->nama_kelompok,
            'penyuluh' => $Data->nama_penyuluh,
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

    public function Market()
    {
    	$Market = Market::all();

    	$Data = [
    		'market' => $Market,
    		'title' => 'Lokasi Pasar'
    	];

    	return view('frontend.content.market', $Data);
    }

    public function get_market($id)
    {
        $Data = Market::where('id',$id)->first();

        return response()->json([
            'nama_pasar' => $Data->nama_pasar,
            'lokasi'=> $Data->lokasi,
            'longtitude' => $Data->longtitude,
            'latitude' => $Data->latitude
        
        ]);
    }

    public function harvest()
    {
    	$Harvests = Harvest::join('tb_desa','tb_harvest.code_desa','tb_desa.code_desa')
                    ->join('tb_comodity','tb_harvest.id_comodity', 'tb_comodity.id_comodity')
                    ->join('farmer_group','tb_harvest.code_farmer','farmer_group.code')
                    ->paginate(15);
        $Harvest  = Harvest::join('tb_desa','tb_harvest.code_desa','tb_desa.code_desa')
                            ->join('tb_comodity','tb_harvest.id_comodity', 'tb_comodity.id_comodity')
                            ->join('farmer_group','tb_harvest.code_farmer','farmer_group.code')
                            ->take(100)->get();
    	$Data = [
            'harvest' => $Harvest,
    		'harvests' => $Harvests,
    		'title' => 'Lokasi Persebaran Produksi Pertanian'
    	];

    	return view('frontend.content.harvest', $Data);
    } 

    public function harvest_search(Request $request)
    {
        $search = $request->search;

    	$Harvests = Harvest::join('tb_desa','tb_harvest.code_desa','tb_desa.code_desa')
                    ->join('tb_comodity','tb_harvest.id_comodity', 'tb_comodity.id_comodity')
                    ->where('produk','like',"%".$search."%")->orwhere('jenis','like',"%".$search."%")
                    ->orwhere('luas_tanam','like',"%".$search."%")->orwhere('luas_panen','like',"%".$search."%")
                    ->paginate();

        $Harvest  = Harvest::all();
    	$Data = [
            'harvest' => $Harvest,
    		'harvests' => $Harvests,
    		'title' => 'Lokasi Persebaran Produksi Pertanian'
    	];

    	return view('frontend.content.harvest', $Data);
    } 

    public function get_harvest($code)
    {
        $Data = Harvest::find($code);

        return response()->json([
            'id' => $Data->id,
			'komoditas'=> $Data->komoditas,
			'kelompok' => $Data->farmer->nama_kelompok,
			'desa'=> $Data->desa->desa,
            'produk'=> $Data->produk,
            'jenis'=> $Data->comodity->jenis,
			'tanam'=> $Data->luas_tanam,
			'panen'=> $Data->luas_panen,
			'kwintal'=> $Data->produktivitas_kw_ha,
			'ton'=> $Data->produksi_ton,
            'longtitude' => $Data->harvest_longtitude,
            'latitude' => $Data->harvest_latitude
        
        ]);
    }

    public function official()
    {
    	$Official = Official::all();

    	$Data = [
    		'official' => $Official,
    		'title' => 'Daftar Petugas Badan Penyuluhan Pertanian'
    	];

    	return view('frontend.content.official', $Data);
    }

    public function activity()
    {
        $Activity = Activity::all();

        $Data = [
            'activity' => $Activity,
            'title' => 'Galery Foto Kegiatan Pertanian'
        ];

        return view('frontend.content.activity', $Data);
    }

    public function get_activity($id)
    {
        $Data = Activity::find($id);

        return response()->json([

            'desa' => $Data->desa->desa,
            'kelompok' => $Data->farmer->nama_kelompok,
            'tanggal'  => $Data->tanggal_pelaksanaan,
            'keterangan' => $Data->keterangan,
            'latitude' => $Data->activity_latitude,
            'longtitude' => $Data->activity_longtitude

        ]);
    }
}

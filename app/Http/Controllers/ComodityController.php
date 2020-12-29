<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comodity;
use App\Helper\Helper;;
use Illuminate\Support\Facades\Session;

class ComodityController extends Controller
{
    public function index()
    {

    }


    public function input(Request $request)
    {
    	try{

	    	$data = new Comodity;
	    	$data->id_comodity = Helper::codeComodity();
	    	$data->komoditas = $request->komoditas;
	    	$data->jenis = $request->jenis;
	    	$data->save();

	    	\Session::flash('sukses','absen pulang berhasil');
	    	return redirect()->back();

	    }catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());

            return redirect()->back();
        }
    }
}

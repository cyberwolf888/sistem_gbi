<?php

namespace App\Http\Controllers\Admin;

use App\Models\Baptisan;
use App\Models\PemberkatanNikah;
use App\Models\PenyerahanAnak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.form');
    }

    public function result(Request $request)
    {
        if($request->jenis_laporan == 1){
            $model = PenyerahanAnak::where(\DB::raw('DATE(created_at)'),'>=',$request->tgl_awal)
                ->where(\DB::raw('DATE(created_at)'),'<=',$request->tgl_akhir)
                ->get();

            return view('admin.laporan.penyerahan_anak',['model'=>$model]);
        }

        if($request->jenis_laporan == 2){
            $model = Baptisan::where(\DB::raw('DATE(created_at)'),'>=',$request->tgl_awal)
                ->where(\DB::raw('DATE(created_at)'),'<=',$request->tgl_akhir)
                ->get();

            return view('admin.laporan.baptisan',['model'=>$model]);
        }

        if($request->jenis_laporan == 3){
            $model = PemberkatanNikah::where(\DB::raw('DATE(created_at)'),'>=',$request->tgl_awal)
                ->where(\DB::raw('DATE(created_at)'),'<=',$request->tgl_akhir)
                ->get();

            return view('admin.laporan.pemberkatan_nikah',['model'=>$model]);
        }
    }
}

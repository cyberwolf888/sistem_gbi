<?php

namespace App\Http\Controllers\Member;

use App\Models\Baptisan;
use App\Models\PemberkatanNikah;
use App\Models\PenyerahanAnak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $c_penyerahan_anak = '[';
        $c_baptisan = '[';
        $c_pemberkatan_nikah = '[';
        for ($i=1; $i<=12; $i++){
            $penyerahan_anak = PenyerahanAnak::whereRaw(DB::raw('MONTH(created_at)='.$i.' AND user_id='.Auth::user()->id))->count();
            $c_penyerahan_anak.=$penyerahan_anak.',';

            $baptisan = Baptisan::whereRaw(DB::raw('MONTH(created_at)='.$i.' AND user_id='.Auth::user()->id))->count();
            $c_baptisan.=$baptisan.',';

            $pemberkatan_nikah = PemberkatanNikah::whereRaw(DB::raw('MONTH(created_at)='.$i.' AND user_id='.Auth::user()->id))->count();
            $c_pemberkatan_nikah.=$pemberkatan_nikah.',';
        }
        $c_penyerahan_anak = substr($c_penyerahan_anak, 0,-1).']';
        $c_baptisan = substr($c_baptisan, 0,-1).']';
        $c_pemberkatan_nikah = substr($c_pemberkatan_nikah, 0,-1).']';

        return view('member.dashboard.index',[
            'penyerahan_anak'=>$c_penyerahan_anak,
            'baptisan'=>$c_baptisan,
            'pemberkatan_nikah'=>$c_pemberkatan_nikah
        ]);
    }

}

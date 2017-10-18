<?php

namespace App\Http\Controllers\Admin;

use App\Models\Baptisan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaptisanController extends Controller
{

    public function index()
    {
        $model = Baptisan::orderBy('created_at','DESC')->get();
        return view('admin.baptisan.manage',[
            'model'=>$model
        ]);
    }

    public function show($id)
    {
        $model = Baptisan::find($id);
        return view('admin.baptisan.detail',[
            'model'=>$model
        ]);
    }

    public function terima(Request $request)
    {
        $model = Baptisan::find($request->req_id);
        $model->dibaptis = $request->dibaptis;
        $model->tgl_baptis = $request->tgl_baptis;
        $model->agama_sebelum = $request->agama_sebelum;
        $model->nama_gkm = $request->nama_gkm;
        $model->telp_gkm = $request->telp_gkm;
        $model->nama_km = $request->nama_km;
        $model->status = 2;
        $model->save();

        $pesan = 'Kepada Bapak/Ibu '.$model->user->name.'<br>';
        $pesan.= 'Permintaan untuk Pembaptisan anda telah <b>diterima</b>. Silakan klik tombol detail dibawah untuk informasi lebih lengkap.';
        $data = array(
            'pesan'=>$pesan,
            'link'=>route('member.baptisan.show',$model->id),
            'to'=>$model->user->email
        );

        \Mail::send('email.baptisan', $data, function ($message) use ($data){

            $message->from(env('MAIL_USERNAME'), 'Rock GBI');

            $message->to($data['to'])->subject('Rock GBI - Baptisan');

        });

        return redirect()->route('admin.baptisan.manage');
    }

    public function tolak(Request $request)
    {
        $model = Baptisan::find($request->req_id);
        $model->status =  0;
        $model->save();

        $pesan = 'Kepada Bapak/Ibu '.$model->user->name.'<br>';
        $pesan.= 'Mohon maaf, permintaan untuk Pembaptisan anda telah <b>ditolak</b>. Silakan klik tombol detail dibawah untuk informasi lebih lengkap.';
        $data = array(
            'pesan'=>$pesan,
            'link'=>route('member.baptisan.show',$model->id),
            'to'=>$model->user->email
        );

        \Mail::send('email.baptisan', $data, function ($message) use ($data){

            $message->from(env('MAIL_USERNAME'), 'Rock GBI');

            $message->to($data['to'])->subject('Rock GBI - Baptisan');

        });

        return redirect()->route('admin.baptisan.manage');
    }
}

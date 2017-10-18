<?php

namespace App\Http\Controllers\Admin;

use App\Models\PenyerahanAnak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenyerahanAnakController extends Controller
{
    public function index()
    {
        $model = PenyerahanAnak::orderBy('created_at','DESC')->get();
        $jadwal = \DB::select('SELECT pendeta,tgl_penyerahan,satelit,count(id) as quota FROM penyerahan_anak GROUP BY tgl_penyerahan,pendeta ORDER BY tgl_penyerahan ASC');
        //dd($jadwal);
        return view('admin.penyerahan_anak.manage',[
            'model'=>$model,
            'jadwal'=>$jadwal
        ]);
    }

    public function show($id)
    {
        $model = PenyerahanAnak::find($id);
        return view('admin.penyerahan_anak.detail',[
            'model'=>$model
        ]);
    }

    public function terima(Request $request)
    {
        $model = PenyerahanAnak::find($request->req_id);
        if($model->checkQuota()){
            $model->status = 2;
            $model->save();

            $pesan = 'Kepada Bapak/Ibu '.$model->user->name.'<br>';
            $pesan.= 'Permintaan untuk Penyerahan Anak anda telah <b>diterima</b>. Silakan klik tombol detail dibawah untuk informasi lebih lengkap.';
            $data = array(
                'pesan'=>$pesan,
                'link'=>route('member.penyerahananak.show',$model->id),
                'to'=>$model->user->email
            );

            \Mail::send('email.penyerahan_anak', $data, function ($message) use ($data){

                $message->from(env('MAIL_USERNAME'), 'Rock GBI');

                $message->to($data['to'])->subject('Rock GBI - Penyerahan Anak');

            });

            return redirect()->route('admin.penyerahananak.manage');
        }else{
            return redirect()->route('admin.penyerahananak.show',$model->id)->with('error','Quota penyerahan anak sudah penuh.');
        }

    }

    public function tolak(Request $request)
    {
        $model = PenyerahanAnak::find($request->req_id);
        $model->status =  0;
        $model->save();

        $pesan = 'Kepada Bapak/Ibu '.$model->user->name.'<br>';
        $pesan.= 'Mohon maaf, permintaan untuk Penyerahan Anak anda telah <b>ditolak</b>. Silakan klik tombol detail dibawah untuk informasi lebih lengkap.';
        $data = array(
            'pesan'=>$pesan,
            'link'=>route('member.penyerahananak.show',$model->id),
            'to'=>$model->user->email
        );

        \Mail::send('email.penyerahan_anak', $data, function ($message) use ($data){

            $message->from(env('MAIL_USERNAME'), 'Rock GBI');

            $message->to($data['to'])->subject('Rock GBI - Penyerahan Anak');

        });

        return redirect()->route('admin.penyerahananak.manage');
    }
}

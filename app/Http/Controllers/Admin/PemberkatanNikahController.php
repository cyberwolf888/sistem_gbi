<?php

namespace App\Http\Controllers\Admin;

use App\Models\PemberkatanNikah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PemberkatanNikahController extends Controller
{

    public function index()
    {
        $model = PemberkatanNikah::orderBy('created_at','DESC')->get();
        return view('admin.pemberkatan_nikah.manage',[
            'model'=>$model
        ]);
    }

    public function show($id)
    {
        $model = PemberkatanNikah::find($id);
        return view('admin.pemberkatan_nikah.detail',[
            'model'=>$model
        ]);
    }

    public function terima(Request $request)
    {
        $model = PemberkatanNikah::find($request->req_id);
        $model->status = 2;
        $model->save();

        $pesan = 'Kepada Bapak/Ibu '.$model->user->name.'<br>';
        $pesan.= 'Permintaan untuk Pemberkatan Nikah anda telah <b>diterima</b>. Silakan klik tombol detail dibawah untuk informasi lebih lengkap.';
        $data = array(
            'pesan'=>$pesan,
            'link'=>route('member.pemberkatannikah.show',$model->id),
            'to'=>$model->user->email
        );

        \Mail::send('email.pemberkatan_nikah', $data, function ($message) use ($data){

            $message->from(env('MAIL_USERNAME'), 'Rock GBI');

            $message->to($data['to'])->subject('Rock GBI - Pemberkatan Nikah');

        });

        return redirect()->route('admin.pemberkatannikah.manage');
    }

    public function tolak(Request $request)
    {
        $model = PemberkatanNikah::find($request->req_id);
        $model->status =  0;
        $model->save();

        $pesan = 'Kepada Bapak/Ibu '.$model->user->name.'<br>';
        $pesan.= 'Mohon maaf, permintaan untuk Pemberkatan Nikah anda telah <b>ditolak</b>. Silakan klik tombol detail dibawah untuk informasi lebih lengkap.';
        $data = array(
            'pesan'=>$pesan,
            'link'=>route('member.pemberkatannikah.show',$model->id),
            'to'=>$model->user->email
        );

        \Mail::send('email.pemberkatan_nikah', $data, function ($message) use ($data){

            $message->from(env('MAIL_USERNAME'), 'Rock GBI');

            $message->to($data['to'])->subject('Rock GBI - Pemberkatan Nikah');

        });

        return redirect()->route('admin.pemberkatannikah.manage');
    }
}

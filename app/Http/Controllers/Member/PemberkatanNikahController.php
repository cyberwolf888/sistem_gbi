<?php

namespace App\Http\Controllers\Member;

use App\Models\PemberkatanNikah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PemberkatanNikahController extends Controller
{
    public function index()
    {
        $model = PemberkatanNikah::where('user_id', \Auth::user()->id)->get();
        return view('member.pemberkatan_nikah.manage',[
            'model'=>$model
        ]);
    }

    public function create()
    {
        $model = new PemberkatanNikah();
        return view('member.pemberkatan_nikah.form',[
            'model'=>$model
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $model = new PemberkatanNikah();
        $filter = [
            'nama_p' => 'required|max:100',
            'tempat_lahir_p' => 'required|max:100',
            'tgl_lahir_p' => 'required',
            'alamat_p' => 'required',
            'telp_p' => 'required',
            'nama_ayah_p' => 'required',
            'nama_ibu_p' => 'required',
            'tempat' => 'required',
            'tgl_acara' => 'required',
            'oleh' => 'required',
        ];

        $validator = \Validator::make($request->all(),$filter);

        if ($validator->fails()) {
            return redirect()
                ->route('member.pemberkatannikah.create')
                ->withErrors($validator)
                ->withInput();
        }

        $model->user_id = \Auth::user()->id;
        $model->nama_p = $request->nama_p;
        $model->tempat_lahir_p = $request->tempat_lahir_p;
        $model->tgl_lahir_p = $request->tgl_lahir_p;
        $model->alamat_p = $request->alamat_p;
        $model->telp_p = $request->telp_p;
        $model->nama_ayah_p = $request->nama_ayah_p;
        $model->nama_ibu_p = $request->nama_ibu_p;
        $model->tgl_acara = $request->tgl_acara;
        $model->tempat = $request->tempat;
        $model->oleh = $request->oleh;
        $model->status = 1;
        $model->save();

        return redirect()->route('member.pemberkatannikah.manage');
    }

    public function show($id)
    {
        $model = PemberkatanNikah::find($id);
        return view('member.pemberkatan_nikah.detail',[
            'model'=>$model
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

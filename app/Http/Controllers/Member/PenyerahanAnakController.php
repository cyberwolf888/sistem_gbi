<?php

namespace App\Http\Controllers\Member;

use App\Models\PenyerahanAnak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenyerahanAnakController extends Controller
{

    public function index()
    {
        $model = PenyerahanAnak::where('user_id',\Auth::user()->id)->get();
        return view('member.penyerahan_anak.manage',[
            'model'=>$model
        ]);
    }

    public function create()
    {
        $model = new PenyerahanAnak();
        return view('member.penyerahan_anak.form',[
            'model'=>$model
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $model = new PenyerahanAnak();
        $filter = [
            'nama_anak' => 'required|max:100',
            'anak_ke' => 'required',
            'img' => 'required|image|max:3500',
            'satelit' => 'required',
            'pendeta' => 'required',
            'tgl_penyerahan' => 'required'
        ];

        $validator = \Validator::make($request->all(),$filter);

        if ($validator->fails()) {
            return redirect()
                ->route('member.penyerahananak.create')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('img')) {
            $path = base_path('assets/anak/');
            $file = \Image::make($request->file('img'))->resize(600, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
            $model->img = $file->basename;
        }

        $model->user_id = \Auth::user()->id;
        $model->nama_anak = $request->nama_anak;
        $model->anak_ke = $request->anak_ke;
        $model->satelit = $request->satelit;
        $model->pendeta = $request->pendeta;
        $model->tgl_penyerahan = $request->tgl_penyerahan;
        $model->status = 1;
        $model->save();

        return redirect()->route('member.penyerahananak.manage');

    }

    public function show($id)
    {
        $model = PenyerahanAnak::find($id);
        return view('member.penyerahan_anak.detail',[
            'model'=>$model
        ]);
    }
}

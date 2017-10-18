<?php

namespace App\Http\Controllers\Member;

use App\Models\Baptisan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaptisanController extends Controller
{
    public function index()
    {
        $model = Baptisan::where('user_id',\Auth::user()->id)->get();
        return view('member.baptisan.manage',[
            'model'=>$model
        ]);
    }

    public function create()
    {
        $model = new Baptisan();
        return view('member.baptisan.form',[
            'model'=>$model
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $model = new Baptisan();

        $filter = [
            'nama_ayah' => 'required|max:100',
            'nama_ibu' => 'required|max:100',
            'pekerjaan' => 'required|max:100'
        ];

        $validator = \Validator::make($request->all(),$filter);

        if ($validator->fails()) {
            return redirect()
                ->route('member.baptisan.create')
                ->withErrors($validator)
                ->withInput();
        }

        $model->user_id = \Auth::user()->id;
        $model->pekerjaan = $request->pekerjaan;
        $model->nama_ayah = $request->nama_ayah;
        $model->nama_ibu = $request->nama_ibu;
        $model->status = 1;
        $model->save();

        return redirect()->route('member.baptisan.manage');
    }

    public function show($id)
    {
        $model = Baptisan::find($id);
        return view('member.baptisan.detail',[
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

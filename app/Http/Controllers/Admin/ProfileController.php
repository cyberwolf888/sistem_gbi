<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $model = \Auth::user();
        return view('admin.profile.form',[
            'model'=>$model
        ]);
    }

    public function update(Request $request)
    {
        $user = \Auth::user();
        $filter = [
            'name' => 'required|max:255',
            'phone' => 'required',
            'address' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'img' => 'image|max:3500',
        ];

        if($request->email === $user->email){
            $filter['email'] = 'required|string|email|max:255';
        }else{
            $filter['email'] = 'required|string|email|max:255|unique:users';
        }

        if($request->password != null){
            $filter['password'] = 'required|string|min:6|confirmed';
            $user->password = bcrypt($request->password);
        }

        $validator = \Validator::make($request->all(),$filter);

        if ($validator->fails()) {
            return redirect()
                ->route('member.profile.manage')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('img')) {
            $path = base_path('assets/profile/');
            if(is_file($path.$user->img)){
                unlink($path.$user->img);
            }
            $file = \Image::make($request->file('img'))->resize(600, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
            $user->img = $file->basename;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->save();

        return redirect()->route('admin.profile.manage')->with('success', 'Add new member!');
    }
}

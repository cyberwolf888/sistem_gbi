<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Image;

class UsersController extends Controller
{

    public function admin()
    {
        $model = User::where('type',1)->get();
        return view('admin.users.admin',[
            'model'=>$model
        ]);
    }


    public function create_admin()
    {
        $model = new User();
        return view('admin.users.form_admin',[
            'model'=>$model
        ]);
    }


    public function store_admin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'password' => 'required|min:6|confirmed',
            'img' => 'required|image|max:3500'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.users.admin.create')
                ->withErrors($validator)
                ->withInput();
        }

        $path = base_path('assets/profile/');
        $file = Image::make($request->file('img')->getRealPath())->resize(600, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->password = bcrypt($request['password']);
        $user->isActive = $request->status;
        $user->type = User::ADMIN;
        $user->img = $file->basename;
        $user->save();

        return redirect()->route('admin.users.admin.manage')->with('success', 'Add new member!');
    }

    public function show_admin($id)
    {
        //
    }

    public function edit_admin($id)
    {
        $model = User::find($id);
        return view('admin.users.form_admin',[
            'model'=>$model,
            'update'=>true
        ]);
    }

    public function update_admin(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $filter = [
            'name' => 'required|max:255',
            'phone' => 'required',
            'address' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'img' => 'image|max:3500'
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

        $validator = Validator::make($request->all(),$filter);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.users.admin.update',$id)
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('img')) {
            $path = base_path('assets/profile/');
            if(is_file($path.$user->img)){
                unlink($path.$user->img);
            }
            $file = Image::make($request->file('img'))->resize(600, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
            $user->img = $file->basename;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->isActive = $request->status;
        $user->save();

        return redirect()->route('admin.users.admin.manage')->with('success', 'Add new member!');
    }

    public function destroy_admin($id)
    {
        //
    }



    public function member()
    {
        $model = User::where('type',2)->get();
        return view('admin.users.member',[
            'model'=>$model
        ]);
    }


    public function create_member()
    {
        $model = new User();
        return view('admin.users.form_member',[
            'model'=>$model
        ]);
    }


    public function store_member(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'password' => 'required|min:6|confirmed',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.users.member.create')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->nama_ayah = $request->nama_ayah;
        $user->nama_ibu = $request->nama_ibu;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->password = bcrypt($request['password']);
        $user->isActive = $request->status;
        $user->type = User::MEMBER;
        $user->save();

        $data = array(
            'user' => $user,
            'password'=>$request['password']
        );

        \Mail::send('email.account', $data, function ($message) use ($data){

            $message->from(env('MAIL_USERNAME'), 'Rock GBI');

            $message->to($data['user']->email)->subject('Rock GBI - Detail Account');

        });

        return redirect()->route('admin.users.member.manage')->with('success', 'Add new member!');
    }

    public function show_member($id)
    {
        //
    }

    public function edit_member($id)
    {
        $model = User::find($id);
        return view('admin.users.form_member',[
            'model'=>$model,
            'update'=>true
        ]);
    }

    public function update_member(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $filter = [
            'name' => 'required|max:255',
            'phone' => 'required',
            'address' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'jenis_kelamin' => 'required'
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

        $validator = Validator::make($request->all(),$filter);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.users.member.update',$id)
                ->withErrors($validator)
                ->withInput();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->isActive = $request->status;
        $user->nama_ayah = $request->nama_ayah;
        $user->nama_ibu = $request->nama_ibu;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->save();

        return redirect()->route('admin.users.member.manage')->with('success', 'Add new member!');
    }

    public function destroy_member($id)
    {
        //
    }
}

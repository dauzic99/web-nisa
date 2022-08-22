<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title = "User";
    public function index()
    {
        $users = User::all();
        // dd($users);

        return view('admin.user.index',['users'=>$users,
        'title'=> $this->title ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create',['title'=> $this->title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        // dd($request->all());
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>Hash::make($request->password),
        ]);
        return redirect()->route('user.index')->with('status','Data user berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.detail',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit',['user'=>$user,'title'=> $this->title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
        ];
        if (isset($request->password)) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        return redirect()->route('user.index')->with('status','Data user berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('user.index')->with('status','Data user berhasil dihapus');

    }

    public function profile()
    {
        return view('auth.show',['title'=>'Profile pengguna']);
    }

    public function editProfile($id)
    {
        $user = User::findOrFail($id);
        return view('auth.edit',['user'=>$user,'title'=> 'profile pengguna']);
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$id,
            'password'=>'nullable',
        ]);
        $user = User::findOrFail($id);
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
        ];
        if (isset($request->password)) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        return redirect()->route('profile.show')->with('status','Data user berhasil diubah');
    }
}

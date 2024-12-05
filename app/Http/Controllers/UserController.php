<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function users() {
        return view('pages.users.daftar_users');
    }
    public function addUser() {
        return view('pages.users.tambah_users');
    }
    public function editUser($id) {
        $uid = Crypt::decrypt($id);
        $data = DB::table('users')->where('kode_user',$uid)->first();
        return view('pages.users.edit_users', compact('data'));
    }
    public function changePassUser($id) {
        $uid = Crypt::decrypt($id);
        $data = DB::table('users')->where('kode_user', $uid)->first();
        return view('pages.users.change_password', compact('data'));
    }
    public function saveUser(Request $request) {
        $request->validate([
            'name' => 'required|unique:users,name',
            'password' => 'required|min:8',
            'role'  => 'required'
        ],[
            'name.required'     => 'Nama Akun yang Akan Dibuat Harus Diisi !',
            'name.unique'       => 'Nama Akun Sudah Terdaftar !',
            'password.required' => 'Password dari Akun Harus Diisi !',
            'password.min'      => 'Panjang Password Harus Lebih Dari 8 Karakter !',
            'role.required'     => 'Devisi Tanggung Jawab Akun Harus Diisi !',
        ]);

        $data = [
            'kode_user' => 'KU_UWK_'.date('yds').random_int(3,1000),
            'name'  =>  $request->name,
            'email' =>  $request->name.'@gmail.com',
            'password'  =>  $request->password,
            'role'  =>  $request->role,
        ];

        if (User::create($data)) {
            return redirect('/users')->with('berhasil','Berhasil Menambah Akun Baru !');
        }
    }
    public function updateUser(Request $request, $id) {
        $uid = Crypt::decrypt($id);
        $request->validate([
            'name' => 'required',
            'role'  => 'required'
        ],[
            'name.required'     => 'Nama Akun yang Akan Dibuat Harus Diisi !',
            'role.required'     => 'Devisi Tanggung Jawab Akun Harus Diisi !',
        ]);

        $data = [
            'name'  =>  $request->name,
            'email' =>  $request->name.'@gmail.com',
            'role'  =>  $request->role,
        ];
        if (User::where('kode_user', $uid)->update($data)) {
            return redirect('/users')->with('berhasil', 'Berhasil Mengubah Data Akun !');
        }
    }
    public function updatePassUser(Request $req, $id) {

        $req->validate([
            'password'   =>  'required|min:8',
            'passwordConfirm' => 'required|min:8|same:password'
        ],[
            'password.required' => 'Password dari Akun Harus Diisi !',
            'password.min'      => 'Panjang Password Harus Lebih Dari 8 Karakter !',
            'passwordConfirm.required'  => 'Silahkan Ketik Ulang Password sebagai Konfirmasi !',
            'passwordConfirm.min'   => 'Panjang Konfirmasi Password Harus Lebih Dari 8 Karakter !',
            'passwordConfirm.same'  => 'Password Konfirmasi Harus Sama Dengan Password Baru !',
        ]);
        $uid = Crypt::decrypt($id);
        $data = [
            'password' => Hash::make($req->password),
        ];
        if (User::where('kode_user', $uid)->update($data)) {
            return redirect('users')->with('berhasil', 'Berhasil Mengubah Password Akun !');
        }
    }
    public function removeUser($id) {
        $uid = Crypt::decrypt($id);
        if (User::where('kode_user', $uid)->delete()) {
            return redirect('users')->with('berhasil', 'Berhasil Menghapus Akun Terpilih !');
        }
    }

}

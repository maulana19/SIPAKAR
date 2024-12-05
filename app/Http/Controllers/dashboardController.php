<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penugasan;
use App\Models\ProgressProduksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

// Berisi Fungsi Sebagai Berikut :
// 1. Menampilkan Halaman dashboard
// 2. Menampilkan Semua Rancangan Halaman sebelum benar benar digunakan.



class dashboardController extends Controller
{
    public function dashboard(){
        return view('pages.dashboard');
    }

    public function home() {
        return view('pages.laporan.buat_laporan');
    }

    public function loginPage() {
        return view('pages.login');
    }
    public function loginProccess(Request $request) {
        $request->validate([
            'username' => 'required',
            'password'  =>'required',
        ],[
            'username.required'  => 'Mohon Isi Nama Akun Untuk Melanjutkan !',
            'password.required'  => 'Mohon Isi Password Akun Untuk Melanjutkan !'
        ]);
        if (Auth::Attempt([
            'name'  => $request->username,
            'password'  => $request->password,
        ])) {
            return redirect('/');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/login');
        }
    }

    public function detailLaporan($id) {
        $uid = Crypt::decrypt($id);

        $dataBatch = ProgressProduksi::where('nomor_penugasan', $uid)->get();
        $infoBatch = DB::table('penugasan')->select('nama_batch', 'users.role')->join('batch', 'batch.kode_batch', '=', 'penugasan.nomor_batch')->join('users', 'users.kode_user','=', 'penugasan.user_id')->where('kode_penugasan', $uid)->first();
        // dd($data[0]->Tugas);
        // dd($data[0]->Tugas->Batch);
        // dd($data[0]->detailBatch);
        // dd($data[0]->detailBatch->detailKomponen);
        // dd($data[0]->detailBatch->detailKomponen->item);
        return view('pages.laporan.detail_laporan', compact('infoBatch', 'dataBatch'));
    }

    public function logout() {
        Auth::logout();
        return redirect('login')->with('error', 'Anda Telah Keluar Dari Sistem');
    }
}

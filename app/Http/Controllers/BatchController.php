<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\DetailBatch;
use App\Models\Penugasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{
    public function batch(){
        return view('pages.batch.daftar_batch');
    }
    public function addBatch(){
        return view('pages.batch.tambah_batch');
    }
    public function detailBatch($id) {
        $uid = Crypt::decrypt($id);
        $infoBatch = DB::table('batch')->where('kode_batch', $uid)->first();
        $dataBatch = DetailBatch::where('nomor_batch', $uid)->get();
        return view('pages.batch.detail_batch', compact('dataBatch', 'infoBatch'));
    }
    public function editBatch($id) {
        return view('pages.batch.edit_batch');
    }
    public function area($id){
        $uid = Crypt::decrypt($id);
        $dataPenugasan = Batch::where('kode_batch', $uid)->first();
        return view('pages.batch.pembagian_area_batch', compact('dataPenugasan'));
    }

    public function removeBatch($id) {
        $uid = Crypt::decrypt($id);
        if (Batch::where('kode_batch', $uid)->delete()) {
            return redirect('/batch-list')->with('berhasil', 'Berhasil Menghapus Batch Produksi.');
        }
    }
}

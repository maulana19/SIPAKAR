<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Komponen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ItemController extends Controller
{
    public function items() {
        return view('pages.items.daftar_item');
    }
    public function addItem(){
        return view('pages.items.tambah_item');
    }
    public function editItem($id){
        return view('pages.items.edit_item', compact('id'));
    }
    public function detailItem($id) {
        $uid = Crypt::decrypt($id);
        $dataItem = Item::where('kode_item', $uid)->first();
        return view('pages.items.detail_item', compact('dataItem'));
    }
    public function removeItem($id) {
        $uid = Crypt::decrypt($id);
        if (Komponen::where('nomor_item', $uid)->delete()) {
            if (Item::where('kode_item', Crypt::decrypt($id))->delete()) {
                return redirect('/items')->with('berhasil', 'Berhasil Menghapus Item.');
            }
        }
    }
}

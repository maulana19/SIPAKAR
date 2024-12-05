<?php

namespace App\Livewire\Item;

use App\Models\Item;
use App\Models\Komponen;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Symfony\Component\Console\Input\Input;

class FormEditItem extends Component
{
    public $uid;
    public $itemId;
    public $kode_item;
    public $nama_item;
    public $itemData = [];
    public $komponenItem = [];
    public $inputedComponent = [];

    public function boot(){
        $this->uid = Crypt::decrypt($this->itemId);
        $data = Item::where('kode_item', $this->uid)->first();
        $this->itemData = $data;
        $this->nama_item = $this->itemData['nama_item'];
        $this->kode_item = $this->itemData['kode_item'];
        foreach ($data->components as $komp) {
            $komponenDetail = [
                'kode_komponen' => $komp->kode_komponen,
                'nama_komponen' => $komp->nama_komponen,
                'nomor_item'    => $komp->nomor_item,
                'panjang'       => $komp->panjang,
                'lebar'         => $komp->lebar,
                'tinggi'        => $komp->tinggi,
                'zona'          =>  $komp->zona,
                'jenis'          =>  $komp->jenis,
                'pola'          =>  $komp->pola,
            ];
            $this->komponenItem[] = $komponenDetail;
        }
    }

    #[On('component-item')]
    public function componentItem($component) {
        $this->inputedComponent = $component;
    }

    public function render()
    {
        return view('livewire.item.form-edit-item', ['dataItem' => $this->itemData, 'dataKomponen' => $this->komponenItem, 'idItem' => $this->itemId]);
    }
    public function updateItem() {
        if ($this->inputedComponent != null) {
            DB::table('component')->where('nomor_item', $this->uid)->delete();
            foreach ($this->inputedComponent as $komponen) {
                Komponen::where('nomor_item', $this->uid)->create($komponen);
            }
        }
        if ($this->kode_item != $this->itemData['kode_item']) {
            Komponen::where('nomor_item', $this->itemData['kode_item'])->update(['nomor_item' => $this->kode_item]);
        }
        Item::where('kode_item', $this->uid)->update([
            'kode_item' => $this->kode_item,
            'nama_item' => $this->nama_item
        ]);
        return redirect('/items')->with('berhasil', 'Berhasil Mengubah Data Item.');
    }
}

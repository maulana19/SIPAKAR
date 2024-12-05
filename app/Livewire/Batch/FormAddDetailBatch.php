<?php

namespace App\Livewire\Batch;

use App\Models\Item;
use App\Models\Komponen;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class FormAddDetailBatch extends Component
{
    public $dataItem = [];
    public $searchItem = '';
    public $dataKomponen = [];
    public $selectedItem;
    public $selectedComponent;
    public $komponenTerpilih = [];

    public function mount() {
        $this->dataItem = Item::all();
    }

    public function cariKomponen() {
        $this->dataKomponen = Komponen::where('nomor_item', Crypt::decrypt($this->selectedItem))->get();
        $this->reset('selectedComponent');
    }

    public function tambahKomponen() {
        $data = Komponen::where('kode_komponen',Crypt::decrypt($this->selectedComponent))->first();
        $detailKomponen = [
            'kode_komponen' => $data->kode_komponen,
            'nama_komponen' => $data->nama_komponen,
            'nama_item' => $data->item->nama_item,
            'jenis' => $data->jenis,
            'panjang' => $data->panjang,
            'lebar' => $data->lebar,
            'tinggi' => $data->tinggi,
            'zona' => $data->zona,
            'pola' => $data->pola,
            'target' => 0
        ];
        $this->komponenTerpilih[] = $detailKomponen;
        $this->dispatch('batch-component', component: $this->komponenTerpilih);
        // $this->reset('selectedItem');
        $this->reset('selectedComponent');
    }

    public function render()
    {
        return view('livewire.batch.form-add-detail-batch');
    }
}

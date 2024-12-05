<?php

namespace App\Livewire\Item;

use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class FormEditComponents extends Component
{
    public $nama_komponen;
    public $panjang;
    public $lebar;
    public $tinggi;
    public $jenis;
    public $zona;
    public $pola;
    public $dataKomponen;
    public $idItem;

    protected $rules = [
        'nama_komponen' =>  'required',
        'panjang'       =>  'required',
        'lebar'         =>  'required',
        'tinggi'        =>  'required',
        'jenis'         =>  'required',
        'zona'          =>  'required',
        'pola'          =>  'required'
    ];
    protected $messages = [
        'nama_komponen.required' =>  'Nama Komponen Harus Diisi.',
        'panjang.required' =>  'Panjang Komponen Harus Diisi.',
        'lebar.required' =>  'Lebar Komponen Harus Diisi.',
        'tinggi.required' =>  'Tinggi Komponen Harus Diisi.',
        'jenis.required' =>  'Jenis Komponen Harus Diisi.',
        'zona.required' =>  'Zona Komponen Harus Diisi.',
        'pola.required' =>  'Pola Komponen Harus Diisi.',
    ];

    public function render()
    {
        return view('livewire.item.form-edit-components', ['dataKomponen' => $this->dataKomponen]);
    }

    public function onSubmitComponent() {
        $this->validate();

        $componentSubmited = [
            'kode_komponen'     =>  'KI_'.date('ysmd').random_int(10,2000),
            'nama_komponen' =>  $this->nama_komponen,
            'nomor_item' =>  Crypt::decrypt($this->idItem),
            'panjang' =>  $this->panjang,
            'lebar' =>  $this->lebar,
            'tinggi' =>  $this->tinggi,
            'zona' =>  $this->zona,
            'jenis' =>  $this->jenis,
            'pola' =>  $this->pola,
        ];
        $this->dataKomponen[] = $componentSubmited;
        $this->dispatch('component-item', component: $this->dataKomponen);
        $this->reset('nama_komponen');
        $this->reset('panjang');
        $this->reset('lebar');
        $this->reset('tinggi');
        $this->reset('jenis');
        $this->reset('zona');
        $this->reset('pola');
    }

    public function deleteComponentItem($kodekomponen) {
        foreach ($this->dataKomponen as $index => $komponen) {
            if ($komponen['kode_komponen'] == Crypt::decrypt($kodekomponen)) {
                unset($this->dataKomponen[$index]);
            }
        }
        $this->dispatch('component-item', component: $this->dataKomponen);
    }
}

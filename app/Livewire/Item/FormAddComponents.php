<?php

namespace App\Livewire\Item;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class FormAddComponents extends Component
{
    public $nama_komponen;
    public $panjang;
    public $lebar;
    public $tinggi;
    public $jenis;
    public $zona;
    public $pola;
    public $datacomponent = [];

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
        return view('livewire.item.form-add-components');
    }
    public function submitcomponent()
    {
        $validasi = $this->validate();
        $componentSubmited = [
            'nama_komponen' =>  $this->nama_komponen,
            'panjang' =>  $this->panjang,
            'lebar' =>  $this->lebar,
            'tinggi' =>  $this->tinggi,
            'jenis' =>  $this->jenis,
            'zona' =>  $this->zona,
            'pola' =>  $this->pola,
        ];
        $this->datacomponent[] = $componentSubmited;
        $this->dispatch('component-item', component: $this->datacomponent);
        $this->reset('nama_komponen');
        $this->reset('panjang');
        $this->reset('lebar');
        $this->reset('tinggi');
        $this->reset('jenis');
        $this->reset('zona');
        $this->reset('pola');
    }
}

<?php

namespace App\Livewire\Item;

use App\Models\Item;
use App\Models\Komponen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class FormAddItem extends Component
{
    public $kode_item;
    public $nama_item;
    public $inputedComponent = [];

    protected $rules = [
        'kode_item' => 'required|unique:item,kode_item',
        'nama_item' => 'required',
    ];

    protected $messages = [
        'kode_item.required' => 'Kode Item Tidak boleh Kosong !',
        'kode_item.unique'   => 'Kode Item Sudah Terdaftar !',
        'nama_item.required' => 'Nama Item Tidak boleh Kosong !',
    ];

    public function render()
    {
        return view('livewire.item.form-add-item');
    }


    #[On('component-item')]
    public function componentItem($component) {
        $this->inputedComponent = $component;
    }

    public function SubmitComponent(){
        $this->validate();
        $dataItem = [
            'kode_item' => $this->kode_item,
            'nama_item' => $this->nama_item,
        ];
        if (Item::create($dataItem)) {
            $getLatestItem = DB::table('item')->where('kode_item', $dataItem['kode_item'])->first();
            $idLatestItem = $getLatestItem->kode_item;
            foreach ($this->inputedComponent as $komponen) {
                $dataKomponen = [
                    'kode_komponen'     =>  'KI_'.date('ysmd').random_int(10,2000),
                    'nama_komponen'     =>  $komponen['nama_komponen'],
                    'nomor_item'        =>  $idLatestItem,
                    'panjang'           =>  $komponen['panjang'],
                    'lebar'             =>  $komponen['lebar'],
                    'tinggi'            =>  $komponen['tinggi'],
                    'zona'              =>  $komponen['zona'],
                    'jenis'             =>  $komponen['jenis'],
                    'pola'              =>  $komponen['pola'],
                ];
                Komponen::create($dataKomponen);
            }
            return redirect('/items')->with('berhasil', 'Berhasil Menambah Item Baru.');
        }else{
            return redirect('/items/add')->with('gagal', 'Gagal Menambah Item Baru.');
        }
    }

}

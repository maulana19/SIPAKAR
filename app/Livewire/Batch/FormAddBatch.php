<?php

namespace App\Livewire\Batch;

use App\Models\Batch;
use App\Models\DetailBatch;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class FormAddBatch extends Component
{
    public $komponenItem;
    public $namaBatch;
    public $tanggalBatch;
    public $target = [];

    public function render()
    {
        return view('livewire.batch.form-add-batch');
    }
    public function saveBatch() {
        //Penambahan Target ke komponenItem
        foreach ($this->komponenItem as $key => $item) {
            if (array_key_exists($key, $this->target)) {
                $this->komponenItem[$key]['target'] = intval($this->target[$key]);
            }
        }
        $data_batch = [
            'kode_batch' => 'B_'.date('ymd').random_int(1,2000),
            'nama_batch' => $this->namaBatch,
            'status'     => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'created_by' => 'KU_UWK_1', //Ganti Nanti Setelah Buat Login
        ];

        //Penyimpanan Batch
        Batch::insert($data_batch);

        foreach ($this->komponenItem as $key => $komponen) {
            $dataDetailBatch = [
                'kode_detail'       => 'BD_'.date('ymd').random_int(1,300),
                'nomor_batch'       => $data_batch['kode_batch'],
                'nomor_komponen'    => $komponen['kode_komponen'],
                'target'            => $komponen['target'],
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ];
            DetailBatch::insert($dataDetailBatch);
        }
        return redirect('/batch-list')->with('berhasil', 'Batch Baru Berhasil Tersimpan !');
    }

    #[On('batch-component')]
    public function componentItem($component) {
        $this->komponenItem = $component;
    }
}

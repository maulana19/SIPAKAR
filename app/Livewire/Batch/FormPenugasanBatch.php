<?php

namespace App\Livewire\Batch;

use App\Models\Batch;
use App\Models\DetailBatch;
use App\Models\Penugasan;
use App\Models\ProgressProduksi;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Laravel\Prompts\Progress;
use Livewire\Component;

class FormPenugasanBatch extends Component
{
    public $uid;
    public $dataBatch;
    public $area;
    public $penugasan = [];
    public $detailProgresAwal = [];

    public function mount($id) {
        $this->uid = Crypt::decrypt($id);
        $this->dataBatch = Batch::where('kode_batch', $this->uid)->first();
        foreach ($this->dataBatch->Area as $key => $area) {
            $this->penugasan[] = $area->Admin->role;
        }
    }

    public function render()
    {
        return view('livewire.batch.form-penugasan-batch');
    }

    public function simpanArea() {
        $this->penugasan[] = $this->area;
    }

    public function simpanPenugasan(){
        if ($this->penugasan != null) {
            $dataPenugasanOld = DB::table('penugasan')->where('nomor_batch', $this->dataBatch->kode_batch)->get();
            foreach ($dataPenugasanOld as $dataTugas) {
                ProgressProduksi::where('nomor_penugasan',$dataTugas->kode_penugasan)->delete();
            }
            Penugasan::where('nomor_batch', $this->dataBatch->kode_batch)->delete();
            foreach ($this->penugasan as $key => $value) {
                $adminLapangan = DB::table('users')->where('role', $value)->first();
                if ($adminLapangan == null) {
                    return redirect('/batch-list')->with('gagal', 'Gagal Menambahkan Pengerjaan Batch Pada Beberapa Area, Pastikan Akun Admin untuk Area Tersebut Telah Ditambahkan !');
                }
                $pembagianArea = [
                    'kode_penugasan'    =>  'BA_'.date('ydm').rand(1,200),
                    'nomor_batch'       =>  $this->dataBatch->kode_batch,
                    'user_id'           =>  $adminLapangan->kode_user
                ];
                $detailBatch = DB::table('detail_batch')->where('nomor_batch', $pembagianArea['nomor_batch'])->get();
                foreach ($detailBatch as $key => $dBatch) {
                    $progressawal = [
                        'kode_progres'     =>  'BP_'.date('ymds').random_int(1,30),
                        'nomor_penugasan'   =>  $pembagianArea['kode_penugasan'],
                        'nomor_detail'      =>  $dBatch->kode_detail,
                        'selesai'           =>  0,
                        'kurang'            =>  $dBatch->target,
                    ];
                    $this->detailProgresAwal[] = $progressawal;
                }
                Penugasan::create($pembagianArea);
            }
            foreach ($this->detailProgresAwal as $uploaded_data) {
                ProgressProduksi::create($uploaded_data);
            }
            return redirect('/batch-list')->with('berhasil', 'Berhasil Menambahkan Area Pengerjaan Batch !');
        }
        return redirect('/batch-list')->with('gagal', 'Gagal Menambahkan Area Pengerjaan Batch, Mohon Pilih Area Untuk Ditugasi !');
    }

    public function hapusarea($id){
        $uid = Crypt::decrypt($id);
        foreach ($this->penugasan as $key => $area) {
            if ($area == $uid) {
                unset($this->penugasan[$key]);
            }
        }
    }
}

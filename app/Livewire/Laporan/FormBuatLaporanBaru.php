<?php

namespace App\Livewire\Laporan;

use App\Models\ProgressProduksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Prompts\Progress;
use Livewire\Component;

class FormBuatLaporanBaru extends Component
{
    public $roleUser;
    public $keyPanjang;
    public $keyLebar;
    public $keyTinggi;
    public $selesai = [];
    public $dataBatch = [];
    public $currentdataBatch = [];

    public function mount(){
        $this->roleUser = Auth::user()->role;
        $progres = DB::table('progress')
                    ->select('progress.*','penugasan.kode_penugasan', 'detail_batch.kode_detail', 'component.nama_komponen',
                             'batch.nama_batch', 'item.nama_item', 'detail_batch.target', 'component.panjang',
                             'component.lebar', 'component.tinggi' )
                    ->join('detail_batch', 'detail_batch.kode_detail', '=', 'progress.nomor_detail')
                    ->join('component', 'component.kode_komponen', '=', 'detail_batch.nomor_komponen')
                    ->join('item', 'item.kode_item', '=', 'component.nomor_item')
                    ->join('penugasan', 'penugasan.kode_penugasan', '=', 'progress.nomor_penugasan')
                    ->join('users', 'users.kode_user', '=', 'penugasan.user_id')
                    ->join('batch', 'batch.kode_batch', '=', 'penugasan.nomor_batch')
                    ->where('progress.kurang','>', 0 )
                    ->where('users.role',$this->roleUser)
                    ->get();

        foreach ($progres as $key => $dataBatch) {
                $data = [
                    'nomor_progres'   => $dataBatch->kode_progres,
                    'nomor_penugasan' => $dataBatch->kode_penugasan,
                    'nomor_detail'    => $dataBatch->kode_detail,
                    'nama_komponen'   => $dataBatch->nama_komponen,
                    'nama_batch'      => $dataBatch->nama_batch,
                    'nama_item'       => $dataBatch->nama_item,
                    'selesai'         => 0,
                    'kurang'          => $dataBatch->kurang,
                    'target'          => $dataBatch->target,
                    'panjang'         => $dataBatch->panjang,
                    'lebar'           => $dataBatch->lebar,
                    'tinggi'          => $dataBatch->tinggi,
                ];
                $this->dataBatch[] = $data;
        }

        $this->currentdataBatch = $this->dataBatch;
    }

    public function render()
    {
        return view('livewire.laporan.form-buat-laporan-baru');
    }

    public function cariKomponen() {
        if ($this->keyPanjang || $this->keyPanjang || $this->keyTinggi != null) {
            $this->currentdataBatch = $this->dataBatch;
            $filtereddata = array_filter($this->currentdataBatch ,function($item) {
                if ($item['panjang'] == $this->keyPanjang || $item['lebar'] == $this->keyLebar || $item['tinggi'] == $this->keyTinggi) {
                    return true;
                }
            });
            $this->currentdataBatch = $filtereddata;
        }else{
            $this->currentdataBatch = $this->dataBatch;
        }
        $this->reset('keyPanjang');
        $this->reset('keyLebar');
        $this->reset('keyTinggi');
    }

    public function simpanLaporan() {
        if ($this->currentdataBatch != null) {
            foreach ($this->currentdataBatch as $key => $dataBatch) {
                if (array_key_exists($key, $this->selesai)) {
                    $this->currentdataBatch[$key]['selesai'] = intval($this->selesai[$key]);
                    if ($this->currentdataBatch[$key]['kurang'] > 0) {
                        $this->currentdataBatch[$key]['kurang'] -= intval($this->selesai[$key]);
                    }
                }
                $data = [
                    'selesai'           =>  $this->currentdataBatch[$key]['selesai'],
                    'kurang'            =>  $this->currentdataBatch[$key]['kurang'],
                ];
                ProgressProduksi::where('kode_progres',$dataBatch['nomor_progres'])->update($data);
            }
        }

        return redirect('/home')->with('berhasil', 'Laporan Pengerjaan Berhasil Disimpan !');
    }
}

<?php

namespace App\Livewire;

use App\Models\Penugasan;
use Livewire\Component;

class ReportProgressList extends Component
{
    public $keyword;
    public $dataReport = [];
    public $filtereddataReport = [];

    public function mount() {
        $data = Penugasan::all();
        foreach ($data as $key => $tugas) {
            $data = [
                'kode_penugasan' => $tugas->kode_penugasan,
                'area' => $tugas->Admin->role,
                'nama_batch' => $tugas->Batch->nama_batch,
            ];
            // dump($data);
            $totalKurang = 0;
            $totalTarget = 0;
            foreach ($tugas->Pengerjaan as $key => $pengerjaan) {
                $totalKurang +=  $pengerjaan->kurang;
                $totalTarget += $pengerjaan->detailBatch->target;
            }
            $data['selesai'] = intval(($totalTarget - $totalKurang)/ $totalTarget *100);
            $this->dataReport[] = $data;
        }
        $this->filtereddataReport = $this->dataReport;
    }

    public function render()
    {
        return view('livewire.report-progress-list');
    }


    public function cariLaporan() {
        if ($this->keyword != null) {
            $this->filtereddataReport = $this->dataReport;
            $key = $this->keyword;
            $filteredArray = array_filter($this->filtereddataReport, function($item) use ($key) {
                if (stripos($item['area'], $key) !== false) {
                    return true;
                }elseif (stripos($item['nama_batch'], $key) !== false) {
                    return true;
                }
            });
            $this->filtereddataReport = $filteredArray;
            $this->reset('keyword');
        }else if ($this->keyword == null) {
            $this->filtereddataReport = $this->dataReport;
        }
    }
}

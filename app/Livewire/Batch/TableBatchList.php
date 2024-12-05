<?php

namespace App\Livewire\Batch;

use App\Models\Batch;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TableBatchList extends Component
{
    public $dataBatch;
    public $keyword;

    public function mount() {
        $this->dataBatch = Batch::all();
    }

    public function render()
    {
        return view('livewire.batch.table-batch-list');
    }

    public function cariBatch() {
        $this->dataBatch = Batch::where('nama_batch', 'LIKE', '%'.$this->keyword.'%')->get();
    }
}

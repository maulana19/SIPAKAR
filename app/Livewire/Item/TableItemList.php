<?php

namespace App\Livewire\Item;

use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TableItemList extends Component
{
    public $key = '';
    public $items = [];

    public function boot(){
        $this->items = Item::all();
    }

    public function render()
    {
        return view('livewire.item.table-item-list',['items' => $this->items]);
    }
    public function submitItemForms() {
        $this->items = Item::where('nama_item', 'LIKE', '%'.$this->key.'%')->get();
    }
}

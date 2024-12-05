<?php

namespace App\Livewire\Users;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchUsers extends Component
{
    public $keyword;
    public $users = [];

    public function render()
    {
        return view('livewire.users.search-users',[
            'data' => $this->users
        ]);
    }

    public function boot() {
        $this->users = DB::table('users')->get();
    }

    public function submit(){
        $this->users = DB::table('users')->where('name', 'LIKE', '%'.$this->keyword.'%')->orWhere('role', 'LIKE', '%'.$this->keyword.'%')->get();
    }

}

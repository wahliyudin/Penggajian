<?php

namespace App\Http\Livewire\Transaksi;

use Domain\Facades\DataGajiFacade;
use Livewire\Component;
use Livewire\WithPagination;

class DataGaji extends Component
{
    use WithPagination;

    public $potongan = 0;
    public $total_gaji = 0;

    public $perPage = 5;
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.transaksi.data-gaji', [
            'data_gaji' => DataGajiFacade::getDataGaji($this->perPage, $this->search)
        ]);
    }
}

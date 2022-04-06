<?php

namespace App\Http\Livewire\Component;

use App\Models\Jabatan;
use Livewire\Component;

class SearchJabatan extends Component
{
    public $searchJabatan = '';
    public $jabatan;

    public $listeners = ['editJabatan'];

    public function selectJabatan(Jabatan $jabatan)
    {
        $this->jabatan = $jabatan->nama;
        $this->emitUp( 'selectedJabatan', $jabatan->id);
        $this->searchJabatan = '';
    }

    public function editJabatan($jabatan_id)
    {
        if ($jabatan_id !== '' || !isset($jabatan_id)){
            $jabatan = Jabatan::find($jabatan_id);
            $this->selectJabatan($jabatan);
        }
    }

    public function render()
    {
        if (strlen($this->jabatan) > 0) {
            $resultJabatans = Jabatan::where('nama', 'LIKE', '%' . $this->jabatan . '%')->get();
        } else {
            $resultJabatans = Jabatan::latest()->get();
        }
        return view('livewire.component.search-jabatan', compact('resultJabatans'));
    }
}

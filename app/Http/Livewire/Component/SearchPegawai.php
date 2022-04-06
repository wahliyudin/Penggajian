<?php

namespace App\Http\Livewire\Component;

use App\Models\Absensi;
use App\Models\Pegawai;
use DB;
use Livewire\Component;

class SearchPegawai extends Component
{
    public $searchPegawai = '';
    public $pegawai;

    public $listeners = ['editPegawai', 'resetPegawaiId'];

    public function resetPegawaiId()
    {
        $this->reset('pegawai');
    }

    public function selectPegawai(Pegawai $pegawai)
    {
        $this->pegawai = $pegawai->nama;
        $this->emitUp('selectedPegawai', $pegawai->id);
        $this->searchPegawai = '';
    }

    public function editPegawai($pegawai_id)
    {
        if ($pegawai_id !== '' || !isset($pegawai_id)) {
            $pegawai = Pegawai::find($pegawai_id);
            $this->selectPegawai($pegawai);
        }
    }

    public function getExist($value)
    {
        return Absensi::where('pegawai_id', $value->id)->first() ? false : true;
    }

    public function render()
    {
        if (strlen($this->pegawai) > 0) {
            $resultPegawai = collect(Pegawai::latest()->where('nama', 'like', '%' . $this->pegawai . '%')->get(['id', 'nama']))->filter(function ($value, $key) {
                return $this->getExist($value);
            });
        } else {
            $resultPegawai = collect(Pegawai::latest()->get(['id', 'nama']))->filter(function ($value, $key) {
                return $this->getExist($value);
            });
        } 
        return view('livewire.component.search-pegawai', compact('resultPegawai'));
    }
}

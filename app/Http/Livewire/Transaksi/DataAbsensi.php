<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\Absensi;
use App\Models\Pegawai;
use App\Models\PotonganGaji;
use DB;
use Domain\Facades\AbsensiFacade;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class DataAbsensi extends Component
{
    use WithPagination, LivewireAlert;
    public $search;
    public $perPage = 5;

    public $pegawai_id;
    public $hadir = 0;
    public $sakit = 0;
    public $alpha = 0;

    public $modal;
    public $absensi;
    public $absensi_id;

    public $listeners = ['selectedPegawai', 'destroy'];

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function showModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->resetErrorBag();
        $this->modal = false;
    }

    public function selectedPegawai($pegawai_id)
    {
        $this->pegawai_id = $pegawai_id;
    }

    public function validation()
    {
        return $this->validate([
            'pegawai_id' => 'required',
            'hadir' => 'required',
            'sakit' => 'required',
            'alpha' => 'required'
        ]);
    }

    public function getData()
    {
        return [
            'pegawai_id' => $this->pegawai_id,
            'hadir' => $this->hadir,
            'sakit' => $this->sakit,
            'alpha' => $this->alpha
        ];
    }

    public function create()
    {
        $this->reset();
        $this->emit('resetPegawaiId');
        $this->showModal();
    }

    public function store()
    {
        $this->validation();
        AbsensiFacade::store($this->getData());
        $this->reset();
        $this->alert('success', 'Created successfully');
    }

    public function edit(Absensi $absensi)
    {
        $this->absensi = $absensi;
        $this->absensi_id = $absensi->id;
        $this->pegawai_id = $absensi->pegawai->id;
        $this->hadir = $absensi->hadir;
        $this->sakit = $absensi->sakit;
        $this->alpha = $absensi->alpha;
        $this->emit('editPegawai', $absensi->pegawai->id);
        $this->showModal();
    }

    public function update()
    {
        $this->validation();
        AbsensiFacade::update($this->absensi, $this->getData());
        $this->reset();
        $this->alert('success', 'Data has been Updated');
    }

    public function delete(Absensi $absensi)
    {
        $this->absensi = $absensi;
        $this->confirm('Apakah anda yakin?', [
            'text' => 'Data yang dihapus tidak akan di kembalikan lagi',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Ya',
            'showCanceledButton' => true,
            'cancelButtonText' => 'Batal',
            'onConfirmed' => 'destroy',
            'onDismissed' => 'batal'
        ]);
    }

    public function destroy()
    {
        AbsensiFacade::destroy($this->absensi);
        $this->alert('success', 'Data has been deleted');
    }

    public function render()
    {
        return view('livewire.transaksi.data-absensi', [
            'absensis' => AbsensiFacade::getAbsensis($this->perPage, $this->search)
        ]);
    }
}

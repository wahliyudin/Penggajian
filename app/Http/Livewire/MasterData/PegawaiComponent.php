<?php

namespace App\Http\Livewire\MasterData;

use App\Models\Jabatan;
use App\Models\Pegawai;
use Domain\Facades\PegawaiFacade;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class PegawaiComponent extends Component
{
    use WithPagination, LivewireAlert;
    public $nik;
    public $nama;
    public $jenis_kelamin = 'laki-laki';
    public $tgl_masuk;
    public $status = 'tetap';
    public $photo;
    public $jabatan_id;
    public $pegawai;

    public $perPage = 5;
    public $search;
    public $modal;

    public $queryString = ['search'];
    public $listeners = ['selectedJabatan', 'destroy'];

    public function showModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->modal = false;
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function validation()
    {
        return $this->validate([
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan_id' => 'required',
            'tgl_masuk' => 'required',
            'status' => 'required',
            'photo' => 'required'
        ]);
    }

    public function getData()
    {
        return [
            'nik' => $this->nik,
            'photo' => $this->photo,
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'jabatan_id' => $this->jabatan_id,
            'tgl_masuk' => $this->tgl_masuk,
            'status' => $this->status
        ];  
    }

    public function selectedJabatan($jabatan_id)
    {
        $this->jabatan_id = $jabatan_id;
    }

    public function edit(Pegawai $pegawai)
    {
        $this->pegawai = $pegawai;
        $this->nama = $pegawai->nama;
        $this->nik = $pegawai->nik;
        $this->jenis_kelamin = $pegawai->jenis_kelamin;
        $this->tgl_masuk = $pegawai->tgl_masuk;
        $this->status = $pegawai->status;
        $this->photo = $pegawai->photo;
        $this->emit('editJabatan', $pegawai->jabatan->id);
        $this->showModal();
    }

    public function create()
    {
        $this->reset();
        $this->showModal();
    }

    public function store()
    {
        $this->validation();
        PegawaiFacade::store($this->getData());
        $this->reset();
        $this->alert('success', 'Created successfully');
    }

    public function update()
    {
        $this->validation();
        PegawaiFacade::update($this->pegawai, $this->getData());
        $this->reset();
        $this->alert('success', 'Data has been Updated');
    }

    public function delete(Pegawai $pegawai)
    {
        $this->pegawai = $pegawai;
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
        PegawaiFacade::destroy($this->pegawai);
        $this->alert('success', 'Data has been deleted');
    }

    public function render()
    {
        return view('livewire.master-data.pegawai-component', [
            'pegawais' => PegawaiFacade::getPegawais($this->perPage, $this->search)
        ]);
    }
}

<?php

namespace App\Http\Livewire\MasterData;

use App\Models\Jabatan;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Domain\Facades\JabatanFacade;
use Livewire\Component;
use Livewire\WithPagination;

class JabatanComponent extends Component
{
    use WithPagination, LivewireAlert;
    public $search;
    public $perPage = 5;

    public $nama;
    public $gaji_pokok = 0;
    public $tunjangan_transport = 0;
    public $uang_makan = 0;
    public $total = 0;
    public $jabatan_id;
    public $jabatan;

    public $modal;

    protected $queryString = ['search'];
    public $listeners = ['destroy'];

    public function updatingSearch()
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

    public function updatedGajiPokok()
    {
        if (resetFormat($this->gaji_pokok) < 0 || is_string(resetFormat($this->gaji_pokok))) $this->gaji_pokok = 'Rp. ';
        $this->calculate();
    }

    public function updatedTunjanganTransport()
    {
        if (resetFormat($this->tunjangan_transport) < 0 || is_string(resetFormat($this->tunjangan_transport))) $this->tunjangan_transport = 'Rp. ';
        $this->calculate();
    }

    public function updatedUangMakan()
    {
        if (resetFormat($this->uang_makan) < 0 || is_string(resetFormat($this->uang_makan))) $this->uang_makan = 'Rp. ';
        $this->calculate();
    }

    public function calculate()
    {
        if (isset($this->gaji_pokok) &&
            isset($this->tunjangan_transport) &&
            isset($this->uang_makan))
        {
            $this->total = numberFormat(resetFormat($this->gaji_pokok) + resetFormat($this->tunjangan_transport) + resetFormat($this->uang_makan));
        }
    }

    public function validation()
    {
        return $this->validate([
            'nama' => 'required',
            'gaji_pokok' => 'required',
            'tunjangan_transport' => 'required',
            'uang_makan' => 'required',
            'total' => 'required'
        ]);
    }

    public function getData()
    {
        return [
            'nama' => $this->nama,
            'gaji_pokok' => resetFormat($this->gaji_pokok),
            'tunjangan_transport' => resetFormat($this->tunjangan_transport),
            'uang_makan' => resetFormat($this->uang_makan),
            'total' => resetFormat($this->total)
        ];
    }

    public function create()
    {
        $this->reset();
        $this->showModal();
    }

    public function store()
    {
        $this->validation();
        JabatanFacade::store($this->getData());
        $this->reset();
        $this->alert('success', 'Created successfully');
    }

    public function edit(Jabatan $jabatan)
    {
        $this->jabatan = $jabatan;
        $this->jabatan_id = $jabatan->id;
        $this->nama = $jabatan->nama;
        $this->gaji_pokok = numberFormat($jabatan->gaji_pokok);
        $this->tunjangan_transport = numberFormat($jabatan->tunjangan_transport);
        $this->uang_makan = numberFormat($jabatan->uang_makan);
        $this->total = numberFormat($jabatan->total);
        $this->showModal();
    }

    public function update()
    {
        $this->validation();
        JabatanFacade::update($this->jabatan, $this->getData());
        $this->reset();
        $this->alert('success', 'Data has been Updated');
    }

    public function delete(Jabatan $jabatan)
    {
        $this->jabatan = $jabatan;
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
        JabatanFacade::destroy($this->jabatan);
        $this->alert('success', 'Data has been deleted');
    }

    public function render()
    {
        return view('livewire.master-data.jabatan-component', [
            'jabatans' => JabatanFacade::getJabatans($this->perPage, $this->search)
        ]);
    }
}

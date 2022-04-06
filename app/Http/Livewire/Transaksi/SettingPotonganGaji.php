<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\PotonganGaji;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class SettingPotonganGaji extends Component
{
    use LivewireAlert;
    public $nama;
    public $potongan;
    public $potonganGaji;
    public $potonganGaji_id;

    public $modal;

    public function showModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->resetErrorBag();
        $this->modal = false;
    }

    public function edit(PotonganGaji $potonganGaji)
    {
        $this->potonganGaji = $potonganGaji;
        $this->potonganGaji_id = $potonganGaji->id;
        $this->nama = $potonganGaji->nama;
        $this->potongan = numberFormat($potonganGaji->potongan);
        $this->showModal();
    }

    public function validation()
    {
        return $this->validate([
            'nama' => 'required',
            'potongan' => 'required',
        ]);
    }

    public function getData()
    {
        return [
            'nama' => $this->nama,
            'potongan' => resetFormat($this->potongan),
        ];
    }

    public function update()
    {
        $this->validation();
        $this->potonganGaji->update($this->getData());
        $this->reset();
        $this->alert('success', 'Data has been Updated');
    }

    public function render()
    {
        return view('livewire.transaksi.setting-potongan-gaji', [
            'data_potongan_gaji' => PotonganGaji::latest()->get()
        ]);
    }
}

<?php

namespace Domain\Repositories;

use App\Models\Pegawai;

class PegawaiRepository
{
    public $pegawai;

    public function __construct()
    {
        $this->pegawai = new Pegawai();
    }

    public function getPegawais($perPage = 10, $search)
    {
        return $search ?
            Pegawai::where('nama', 'like', '%' . $search . '%')
                ->latest()
                ->paginate($perPage) :
            Pegawai::latest()
                ->paginate($perPage);
    }

    public function store($data)
    {
        return $this->pegawai->create($data);
    }

    public function update($pegawai, $data)
    {
        return $pegawai->update($data);
    }

    public function destroy($pegawai)
    {
        return $pegawai->delete();
    }
}

<?php

namespace Domain\Repositories;

use App\Models\Jabatan;

class JabatanRepository
{
    public $jabatan;

    public function __construct()
    {
        $this->jabatan = new Jabatan();
    }

    public function getJabatans($perPage = 10, $search)
    {
        return $search ?
            Jabatan::where('nama', 'like', '%' . $search . '%')
            ->latest()
            ->paginate($perPage) :
            Jabatan::latest()
            ->paginate($perPage);
    }

    public function store($data)
    {
        return $this->jabatan->create($data);
    }

    public function update($jabatan, $data)
    {
        return $jabatan->update($data);
    }

    public function destroy($jabatan)
    {
        return $jabatan->delete();
    }
}

<?php

namespace Domain\Repositories;

use App\Models\DataGaji;
use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Builder;

class DataGajiRepository
{
    public function getDataGaji($perPage = 10, $search)
    {
        return DataGaji::with('pegawai')->whereHas('pegawai', function(Builder $query) use ($search){
            $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('nik', 'like', '%' . $search . '%');
        })->latest()->paginate($perPage);
    }
}

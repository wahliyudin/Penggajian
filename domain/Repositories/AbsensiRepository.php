<?php

namespace Domain\Repositories;

use App\Models\Absensi;
use App\Models\DataGaji;
use App\Models\Pegawai;
use App\Models\PotonganGaji;
use Brick\Math\BigInteger;
use DB;
use Domain\Traits\PaginateCollection;
use Illuminate\Database\Eloquent\Builder;

class AbsensiRepository
{
    use PaginateCollection;
    public $absensi;

    public function __construct()
    {
        $this->absensi = new Absensi();
    }

    public function getAbsensis($perPage = 10, $search)
    {
        return Absensi::with('pegawai')->whereHas('pegawai', function (Builder $query) use ($search) {
            $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('nik', 'like', '%' . $search . '%');
        })->latest()->paginate($perPage);
    }

    public function store($data)
    {
        $this->storeDataGaji($data);
        return $this->absensi->create($data);
    }

    public function storeDataGaji($data)
    {
        $potongan = $this->generatePotongan($data['alpha']);
        $total = Pegawai::find($data['pegawai_id'])->jabatan->total;
        return DataGaji::create([
            'pegawai_id' => $data['pegawai_id'],
            'potongan' => $potongan,
            'total_gaji' => $total - $potongan
        ]);
    }

    public function generatePotongan($alpha)
    {
        return $alpha * (int) PotonganGaji::where('nama', 'alpha')->first(['potongan'])->potongan;
    }

    public function update($absensi, $data)
    {
        return $absensi->update($data);
    }

    public function destroy($absensi)
    {
        return $absensi->delete();
    }
}

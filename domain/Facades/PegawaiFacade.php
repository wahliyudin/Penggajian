<?php

namespace Domain\Facades;

use Illuminate\Support\Facades\Facade;

class PegawaiFacade extends Facade
{
    /**
     * @method static \Domain\Repositories\PegawaiRepository getPegawais($perPage, $search)
     * @see \Domain\Repositories\PegawaiRepository::getJabatans
     * @method static \Domain\Repositories\PegawaiRepository update($pegawai, $data)
     * @see \Domain\Repositories\PegawaiRepository::update
     * @method static \Domain\Repositories\PegawaiRepository destroy($pegawai)
     * @see \Domain\Repositories\PegawaiRepository::destroy
     * @method static \Domain\Repositories\PegawaiRepository store($data)
     * @see \Domain\Repositories\PegawaiRepository::store
     */
    protected static function getFacadeAccessor()
    {
        return 'pegawai';
    }
}

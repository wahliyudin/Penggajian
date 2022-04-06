<?php

namespace Domain\Facades;

use Illuminate\Support\Facades\Facade;

class JabatanFacade extends Facade
{
    /**
     * @method static \Domain\Repositories\JabatanRepository getJabatans($perPage, $search)
     * @see \Domain\Repositories\JabatanRepository::getJabatans
     * @method static \Domain\Repositories\JabatanRepository update($jabatan, $data)
     * @see \Domain\Repositories\JabatanRepository::update
     * @method static \Domain\Repositories\JabatanRepository destroy($jabatan)
     * @see \Domain\Repositories\JabatanRepository::destroy
     * @method static \Domain\Repositories\JabatanRepository store($data)
     * @see \Domain\Repositories\JabatanRepository::store
     */
    protected static function getFacadeAccessor()
    {
        return 'jabatan';
    }
}

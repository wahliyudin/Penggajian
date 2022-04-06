<?php
namespace Domain\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

trait PaginateCollection
{
    /**
     * @param mixed $items
     * @param int $perPage
     * @param mixed $path => route('')
     * @param null $page
     * @param array $options
     *
     * @return [type]
     */
    public function paginate($items, $perPage = 15, $path, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return (new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options))->withPath($path);
    }
}

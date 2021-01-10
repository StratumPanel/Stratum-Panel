<?php

namespace Stratum\Repositories;

use Stratum\Models\IpAllocations;
use Stratum\Contracts\IpAllocationsRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class IpAllocationsRepositoryEloquent.
 *
 * @package namespace Stratum\Repositories;
 */
class IPAllocationsRepository extends BaseRepository implements IPAllocationsRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return IPAllocations::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

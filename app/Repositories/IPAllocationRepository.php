<?php

namespace Stratum\Repositories;

use Stratum\Contracts\IPAllocationRepositoryInterface;
use Stratum\Models\IPAllocation;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Stratum\Validators\IPAllocationValidator;

/**
 * Class IPAllocationRepository.
 *
 * @package namespace Stratum\Repositories;
 */
class IPAllocationRepository extends BaseRepository implements IPAllocationRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return IPAllocation::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

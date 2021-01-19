<?php

namespace Stratum\Repositories;

use Stratum\Contracts\ServerRepositoryInterface;
use Stratum\Models\Server;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Stratum\Validators\ServerValidator;

/**
 * Class NodeRepository.
 *
 * @package namespace Stratum\Repositories;
 */
class NodeRepository extends BaseRepository implements ServerRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Nodes::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

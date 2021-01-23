<?php

namespace Stratum\Repositories;

use Stratum\Contracts\NodeRepositoryInterface;
use Stratum\Models\Node;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Stratum\Validators\NodeValidator;

/**
 * Class NodeRepository.
 *
 * @package namespace Stratum\Repositories;
 */
class NodeRepository extends BaseRepository implements NodeRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Node::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

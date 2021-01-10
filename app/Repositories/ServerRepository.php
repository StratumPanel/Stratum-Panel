<?php

namespace Stratum\Repositories;

use Stratum\Contracts\ServerRepositoryInterface;
use Stratum\Models\Server;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Stratum\Validators\ServerValidator;

/**
 * Class ServerRepository.
 *
 * @package namespace Stratum\Repositories;
 */
class ServerRepository extends BaseRepository implements ServerRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Server::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

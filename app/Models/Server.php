<?php

namespace Stratum\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Server.
 *
 * @package namespace Stratum\Models;
 */
class Server extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'vm_id', 'memory', 'storage', 'cores', 'node', 'ip'
    ];

    public function node()
    {
        return $this->belongsTo(Nodes::class, 'node_id');
    }
}

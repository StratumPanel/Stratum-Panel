<?php

namespace Stratum\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class IpAllocations.
 *
 * @package namespace Stratum\Entities;
 */
class IPAllocations extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ip', 'gateway', 'netmask', 'mac_address'];

}

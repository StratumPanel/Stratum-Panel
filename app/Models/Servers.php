<?php

namespace Stratum\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Servers extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'vm_id', 'memory', 'storage', 'cores', 'node', 'ip'
    ];
}

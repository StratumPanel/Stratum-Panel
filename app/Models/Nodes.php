<?php

namespace Stratum\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nodes extends Model
{
    protected $fillable = [
        'name', 'maxmemory', 'maxstorage', 'currentmemory', 'currentstorage'
    ];

    public function ipaddresses()
    {
        return $this->hasMany(VMIPAddresses::class);
    }
}

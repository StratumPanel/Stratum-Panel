<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'hostname', 'username', 'password', 'port', 'auth_type'
    ];

    public function servers()
    {
        return $this->hasMany(Server::class);
    }
}

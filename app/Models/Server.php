<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'user_id', 'node_id', 'proxmoxvmid'
    ];

    public function node()
    {
        return $this->belongsTo(Node::class);
    }

    public function owner()
    {
        return $this->hasOne(User::class);
    }
}

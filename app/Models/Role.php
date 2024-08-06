<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'super_admin', 'permissions', 'status', 'created_by'];

    protected $casts = [
        'name'          => 'string',
        'super_admin'   => 'boolean',
        'permissions'   => 'json',
        'status'        => 'integer',
        'created_by'    => 'integer'
    ];


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeNoSuperAdmin($query)
    {
        return $query->where('super_admin', 0);
    }
}

<?php
namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    public const GUARD_NAME = 'api';
    protected $guarded = ['id'];
}
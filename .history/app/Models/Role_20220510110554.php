<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];
    public function hasRole($roles)
{
    if (is_string($roles)) {
        return $this->roles->contains('name', $roles);
    }

    if ($roles instanceof Role) {
        return $this->roles->contains('id', $roles->id);
    }
}
}

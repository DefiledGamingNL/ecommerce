<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'guard_name'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }

    public function revokePermissionTo(Permission $permission)
    {
        return $this->permissions()->detach($permission);
    }

    public function hasPermissionTo(Permission $permission)
    {
        return $this->permissions->contains($permission);
    }

    public function assignRoleTo(User $user)
    {
        return $user->roles()->save($this);
    }

    public function removeRoleFrom(User $user)
    {
        return $user->roles()->detach($this);
    }

    public function hasRole(User $user)
    {
        return $user->roles->contains($this);
    }


}

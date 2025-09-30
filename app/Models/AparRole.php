<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AparRole extends Model
{
    protected $table = 'apar_roles';

    protected $fillable = [
        'name',
        'display_name',
        'permissions'
    ];

    protected $casts = [
        'permissions' => 'array'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'apar_user_roles', 'role_id', 'user_id');
    }

    public function hasPermission(string $permission): bool
    {
        return in_array($permission, $this->permissions ?? []);
    }
}

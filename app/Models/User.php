<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function aparRoles()
    {
        return $this->belongsToMany(AparRole::class, 'apar_user_roles', 'user_id', 'role_id');
    }

    public function hasAparRole(string $roleName): bool
    {
        return $this->aparRoles()->where('name', $roleName)->exists();
    }

    public function hasAparPermission(string $permission): bool
    {
        return $this->aparRoles()->get()->some(function ($role) use ($permission) {
            return $role->hasPermission($permission);
        });
    }

    public function getAparRoleNames(): array
    {
        return $this->aparRoles()->pluck('name')->toArray();
    }
}

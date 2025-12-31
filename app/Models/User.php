<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Role;
use App\Models\Conference;


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

                public function roles(): BelongsToMany
            {
                return $this->belongsToMany(Role::class, 'users_roles', 'user_id', 'role_id')
                    ->withTimestamps();
            }

            public function conferences(): BelongsToMany
            {
                return $this->belongsToMany(Conference::class, 'users_conferences', 'user_id', 'conference_id')
                    ->withPivot('registered_at')
                    ->withTimestamps();

                
            }
        public function hasRoleName(string $roleName): bool
        {
            $roleList = $this->roles()->get();

            foreach ($roleList as $roleItem) {
                if ($roleItem->name === $roleName) {
                    return true;
                }
            }

            return false;
        }


            public function hasAnyRole(array $roleNameList): bool
            {
                foreach ($roleNameList as $oneRoleName) {
                    if ($this->hasRoleName($oneRoleName)) {
                        return true;
                    }
                }

                return false;
            }



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
}

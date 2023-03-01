<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Checks if user is a super admin
     *
     * @return boolean
     */
    public function isSuperAdmin() : bool
    {
        return (bool) $this->is_super_admin;
    }

    /**
     * Create admin.
     *
     * @param array $details
     * @return array
     */
    public function createSuperAdmin(array $details) : self
    {
        $user = new self($details);

        if (! $this->superAdminExists()) {
            $user->is_super_admin = 1;
        }

        $user->save();

        return $user;
    }
}

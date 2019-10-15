<?php

namespace App;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'pin_code',
        'country',
        'status',
        'ip_address',
        'last_active',
        'role_id',
        'image_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the image associated with the user.
     */
    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    /**
     * @param string|array $roles
     * @return
     */
    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        Auth::logout();
        return false;
    }

    /**
     * Check multiple roles
     * @param array $roles
     * @return
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->role()->whereIn('name', $roles)->first();
    }

    /**
     * Check one role
     * @param string $role
     * @return
     */
    public function hasRole($role)
    {
        return null !== $this->role()->where('name', $role)->first();
    }

}

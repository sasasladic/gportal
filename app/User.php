<?php

namespace App;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany as HasManyAlias;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @method static find($id)
 */
class User extends Authenticatable implements MustVerifyEmail, CanResetPassword, JWTSubject
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
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Return role associated with the user.
     * @return BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Return image associated with the user.
     * @return BelongsTo
     */
    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    /**
     * Return ticket related with user who left ticket.
     * @return HasManyAlias
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Return server with which user is related.
     * @return HasManyAlias
     */
    public function servers()
    {
        return $this->hasMany(Server::class);
    }

    /**
     * Return orders with which user is related.
     * @return HasManyAlias
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Return comments which user left.
     * @return HasManyAlias
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}

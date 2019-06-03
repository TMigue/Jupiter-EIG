<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verified_at',
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
     * Las propuestas creadas por el usuario
     */

    public function propuestas()
    {
        return $this->hasMany(Propuestas::class, 'cif', 'cif');

    }

    /**
     * Las propuestas asignadas al usuario
     */

    public function assignedPropuestas()
    {
        return $this->belongsToMany(Propuestas::class, 'propuestas_users');
    }

    public function users()
    {
        return User::select('id', 'name')->get();
    }

    //Cola de verificacion de emails
    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerifyEmailQueued);
    }
}

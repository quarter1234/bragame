<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use  Spatie\Permission\Traits\HasRoles;

// class User extends Authenticatable implements JWTSubject
class User extends Authenticatable
{
    use HasRoles, HasFactory, Notifiable;

    protected $guard_name = 'web';
    protected $table = 'd_user';

    protected $guarded = ['uid'];
    protected $primaryKey = 'uid';
    // public $timestamps = false;
    protected $dateFormat = 'U';
    
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name',
    //     'mobile',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // /**
    //  * Get the identifier that will be stored in the subject claim of the JWT.
    //  *
    //  * @return mixed
    //  */
    // public function getJWTIdentifier()
    // {
    //     return $this->getKey();
    // }

    // /**
    //  * Return a key value array, containing any custom claims to be added to the JWT.
    //  *
    //  * @return array
    //  */
    // public function getJWTCustomClaims()
    // {
    //     return [];
    // }
}

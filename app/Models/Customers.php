<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @method static find($id)
 * @method static create(array $array)
 * @method static findOrFail($id)
 */
class Customers extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject{

    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'n_customer',
        'firstname',
        'lastname',
        'gender' ,
        'mail' ,
        'phone' ,
        'password',
        'birthdate',
        'address' ,
        'created_at',
        'deleted_at',
        'updated_at',
        'first_met',
        'token',
        'password_request' 
    ];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */

    public function getJWTCustomClaims(): array
    {
        return [];
    }


}

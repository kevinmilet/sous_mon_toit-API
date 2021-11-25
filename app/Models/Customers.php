<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 *  @OA\Schema(
 *   schema="Customers",
 *   title="Customers",
 *   description="Customers model",
 *   @OA\Property(
 *     property="id", description="ID of the customer",
 *     @OA\Schema(type="integer", example=1)
 *   ),
 *   @OA\Property(
 *     property="n_customer", description="Number of the customer",
 *     @OA\Schema(type="string", example="df1244586")
 *   ),
 *   @OA\Property(
 *     property="firstname", description="",
 *     @OA\Schema(type="string", example="François")
 *   ),
 *   @OA\Property(
 *     property="lastname", description="",
 *     @OA\Schema(type="string", example="Duhamel")
 *   ),
 *   @OA\Property(
 *     property="gender", description="Male or Female or Agender",enum={"M", "F", "A"},
 *     @OA\Schema(type="string", example="M")
 *   ),
 *   @OA\Property(
 *     property="mail", description="",
 *     @OA\Schema(type="email", example="pass@gmail.com")
 *   ),
 *   @OA\Property(
 *     property="phone", description="",
 *     @OA\Schema(type="number", example="0785485796")
 *   ),
 *   @OA\Property(
 *     property="password", description="",
 *     @OA\Schema(type="string", example="pouet")
 *   ),
 *   @OA\Property(
 *     property="birthdate", description="",
 *     @OA\Schema(type="date", example="16-06-1994")
 *   ),
 *   @OA\Property(
 *     property="address", description="",
 *     @OA\Schema(type="string", example="72 rue des Jacobins")
 *   ),
 *   @OA\Property(
 *     property="created_at", description="Date of created",
 *     @OA\Schema(type="date", example="16-06-1994")
 *   ),
 *   @OA\Property(
 *     property="deleted_at", description="Date of archived",
 *     @OA\Schema(type="date", example="24-08-2021")
 *   ),
 *   @OA\Property(
 *     property="updated_at", description="Date of updated",
 *     @OA\Schema(type="date", example="18-01-2008")
 *   ),
 *   @OA\Property(
 *     property="first_met", description="if there has already been a meeting with the client",
 *     @OA\Schema(type="boolean", example="1")
 *   ),
 *   @OA\Property(
 *     property="token", description="?",
 *     @OA\Schema(type="string", example="vxh513j551jvf1")
 *   ),
 *   @OA\Property(
 *     property="password_request", description="if there is a password change request",
 *     @OA\Schema(type="boolean", example="0")
 *   ),
 *  )
 *  @method static find($id)
 *  @method static create(array $array)
 *  @method static findOrFail($id)
 */
class Customers extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject{

    use Authenticatable, Authorizable, HasFactory, SoftDeletes;

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

    protected $guard = 'customer';

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

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
 *   schema="Staffs",
 *   title="Staffs",
 *   description="Staffs model",
 *   @OA\Property(
 *     property="id", description="ID of the staff",
 *     @OA\Schema(type="integer", example=1)
 *   ),
 *   @OA\Property(
 *     property="login", description="",
 *     @OA\Schema(type="string", example="jbourgeois")
 *   ),
 *   @OA\Property(
 *     property="firstname", description="",
 *     @OA\Schema(type="string", example="Jeannine")
 *   ),
 *   @OA\Property(
 *     property="lastname", description="",
 *     @OA\Schema(type="string", example="Bourgeois")
 *   ),
 *   @OA\Property(
 *     property="created_at", description="Date of created",
 *     @OA\Schema(type="date", example="16-06-2008")
 *   ),
 *   @OA\Property(
 *     property="updated_at", description="Date of updated",
 *     @OA\Schema(type="date", example="18-08-2008")
 *   ),
 *   @OA\Property(
 *     property="deleted_at", description="Date of archived",
 *     @OA\Schema(type="date", example="24-08-2021")
 *   ),
 *   @OA\Property(
 *     property="mail", description="",
 *     @OA\Schema(type="email", example="jb_du_59@wanadoo.fr")
 *   ),
 *   @OA\Property(
 *     property="phone", description="",
 *     @OA\Schema(type="number", example="0648585788")
 *   ),
 *   @OA\Property(
 *     property="password", description="",
 *     @OA\Schema(type="string", example="pouet")
 *   ),
 *   @OA\Property(
 *     property="id_function", description="",
 *     @OA\Schema(type="integer", example=1)
 *   ),
 *   @OA\Property(
 *     property="id_role", description="",
 *     @OA\Schema(type="integer", example=2)
 *   ),
 *   @OA\Property(
 *     property="avatar", description="",
 *     @OA\Schema(type="string", example="jeannine.jpg")
 *   ),
 *   @OA\Property(
 *     property="alert_reader", description="unread notification or not",
 *     type="boolean", example=0
 *   ),
 *  )
 * @method static find($id)
 * @method static findOrFail($id)
 * @method static where(string $string, $id)
 * @method static create(array $array)
 * @method static update(array $array)
 */
class Staffs extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable, HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'login', 
        'firstname', 
        'lastname', 
        'created_at', 
        'updated_at', 
        'deleted_at', 
        'mail', 
        'phone', 
        'password', 
        'avatar', 
        'alert_reader', 
        'id_function', 
        'id_role',
    ];

    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */

    public function getJWTCustomClaims()
    {
        return [];
    }

}

<?php


namespace App\Models;


use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

/**
 *  @OA\Schema(
 *      schema="Roles",
 *      title="Roles",
 *      description="Roles model",
 *      @OA\Property(
 *          property="id", description="ID of the role",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Property(
 *          property="role", description="",
 *          @OA\Schema(type="string", example="admin")
 *      ),
 *  )
 */
class Roles extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $fillable = [
        'id', 'role',
    ];

    protected $hidden = [
    ];
}

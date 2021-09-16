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
 *      schema="Functions",
 *      title="Functions",
 *      description="Functions model",
 *      @OA\Property(
 *          property="id", description="ID of the function",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Property(
 *          property="function_name", description="Name of the estate type",
 *          @OA\Schema(type="string", example="Director")
 *      ),
 *  )
 */
class Functions extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $fillable = [
        'id', 'function_name',
    ];

    protected $hidden = [
    ];
}

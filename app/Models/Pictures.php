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
 *      schema="Pictures",
 *      title="Pictures",
 *      description="Pictures model",
 *      @OA\Property(
 *          property="id", description="",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Property(
 *          property="folder", description="",
 *          @OA\Schema(type="string", example="Director")
 *      ),
 *      @OA\Property(
 *          property="name", description="",
 *          @OA\Schema(type="string", example="Director")
 *      ),
 *      @OA\Property(
 *          property="alt", description="",
 *          @OA\Schema(type="string", example="Director")
 *      ),
 *      @OA\Property(
 *          property="cover", description="",
 *          @OA\Schema(type="boolean", example="0")
 *      ),
 *      @OA\Property(
 *          property="created_at", description="Date of created",
 *          @OA\Schema(type="date", example="19-07-2021")
 *      ),
 *      @OA\Property(
 *          property="updated_at", description="Date of updated",
 *          @OA\Schema(type="date", example="18-08-2021")
 *      ),
 *      @OA\Property(
 *          property="id_estate", description="",
 *          @OA\Schema(type="integer", example=2)
 *      ),
 *  )
 * 
 * @method static find($id)
 * @method static where(string $string, $id_estate)
 * @method create(array $array)
 */
class Pictures extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $fillable = [
        'id', 'folder', 'name', 'cover', 'alt', 'id_estate',
    ];

    protected $hidden = [
    ];
}

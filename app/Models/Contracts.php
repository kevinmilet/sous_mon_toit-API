<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Lumen\Auth\Authorizable;

/**
 * @method static findOrFail($id_contract)
 * 
 *  @OA\Schema(
 *   schema="Contract",
 *   title="Contracts",
 *   description="Contracts model",
 *   @OA\Property(
 *     property="id", description="ID of the user",
 *     @OA\Schema(type="number", example=1)
 *  ),
 *   @OA\Property(
 *     property="created_at", description="Date of created",
 *     @OA\Schema(type="date", example="16-06-1994")
 *  ),
 *   @OA\Property(
 *     property="updated_at", description="Date of updated",
 *     @OA\Schema(type="date", example="18-01-2008")
 *  ),
 *   @OA\Property(
 *     property="deleted_at", description="Date of archived",
 *     @OA\Schema(type="date", example="24-08-2021")
 *  ),
 *   @OA\Property(
 *     property="folder", description="Folder where the contract is stocked",
 *     @OA\Schema(type="string", example="bail")
 *  ),
 *   @OA\Property(
 *     property="name", description="Name of the contract",
 *     @OA\Schema(type="string", example="bail-1244586")
 *  ),
 *   @OA\Property(
 *     property="id_staff", description="Id of the staff",
 *     @OA\Schema(type="number", example="3")
 *  ),
 *   @OA\Property(
 *     property="id_estate", description="Id of the estate",
 *     @OA\Schema(type="number", example="4")
 *  ),
 *   @OA\Property(
 *     property="id_customer", description="Id of the customer",
 *     @OA\Schema(type="number", example="1")
 *  ),
 *   @OA\Property(
 *     property="id_contract_type", description="Id of the contract type",
 *     @OA\Schema(type="number", example="1")
 *  ),
 * )
 */
class Contracts extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'folder',
        'name',
        'id_estate',
        'id_customer',
        'id_staff',
        'id_contract_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];
}

<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *  @OA\Schema(
 *      schema="ContractsTypes",
 *      title="ContractsTypes",
 *      description="ContractsTypes model",
 *      @OA\Property(
 *          property="id", description="ID of the contract type",
 *          @OA\Schema(type="number", example=1)
 *      ),
 *      @OA\Property(
 *          property="contract_type", description="Name of the contract type",
 *          @OA\Schema(type="string", example="Bail")
 *      ),
 *      @OA\Property(
 *          property="template_path", description="Path of the contract type template",
 *          @OA\Schema(type="string", example="bail.docx")
 *      ),
 *  )
 */
class ContractsTypes extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'contract_type',
        'template_path',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        '',
    ];
}
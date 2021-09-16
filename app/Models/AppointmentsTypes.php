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
 *   schema="AppointmentsTypes",
 *   title="AppointmentsTypes",
 *   description="AppointmentsTypes model",
 *   @OA\Property(
 *     property="id", description="ID of appointment type",format="int64",
 *     @OA\Schema(type="integer", example=1)
 *  ),
 *   @OA\Property(
 *     property="appointment_type", description="Appointment type",
 *     @OA\Schema(type="string", example="visite")
 *  ),
 * )
 */
class AppointmentsTypes extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'appointment_type',
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
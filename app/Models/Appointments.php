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
 *   schema="Appointments",
 *   title="Appointments",
 *   required={"id", "scheduled_at","created_at","id_staff"},
 *   description="Appointments model",
 *   @OA\Property(
 *     property="id", description="ID of appointment",format="int64",
 *     @OA\Schema(type="integer", example=1)
 *  ),
 *   @OA\Property(
 *     property="scheduled_at", description="Date of appointment",
 *     @OA\Schema(type="date", example="18-11-2021")
 *  ),
 *   @OA\Property(
 *     property="created_at", description="Date of created",
 *     @OA\Schema(type="date", example="16-08-2021")
 *  ),
 *   @OA\Property(
 *     property="updated_at", description="Date of updated",
 *     @OA\Schema(type="date", example="18-08-2021")
 *  ),
 *   @OA\Property(
 *     property="notes", description="all you need to know for the appointment",
 *     @OA\Schema(type="string", example="warning ! he is a serious customer !")
 *  ),
 *   @OA\Property(
 *     property="id_estate", description="Id of the estate",
 *     @OA\Schema(type="integer", example="4")
 *  ),
 *   @OA\Property(
 *     property="id_staff", description="Id of the staff",
 *     @OA\Schema(type="integer", example="3")
 *  ),
 *   @OA\Property(
 *     property="id_customer", description="Id of the customer",
 *     @OA\Schema(type="integer", example="1")
 *  ),
 *   @OA\Property(
 *     property="id_appointment_type", description="Id of the appointment type",
 *     @OA\Schema(type="integer", example="1")
 *  ),
 * )
 * @method static find($appointment_id)
 * @method static where(string $string, $customer_id)
 * @method static create(array $array)
 * @method static findOrFail($appointment_id)
 */
class Appointments extends Model
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'notes',
        'scheduled_at',
        'id_estate',
        'id_staff',
        'id_customer',
        'id_appointment_type'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];
}

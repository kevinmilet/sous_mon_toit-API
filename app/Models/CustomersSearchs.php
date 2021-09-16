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
 *   schema="CustomersSearchs",
 *   title="CustomersSearchs",
 *   description="CustomersSearchs model",
 *   @OA\Property(
 *     property="id", description="ID of the customer",
 *     @OA\Schema(type="integer", example=1)
 *   ),
 *   @OA\Property(
 *     property="buy_or_rent", description="it is a search to buy a property or sell a property",
 *     enum={"BUY", "RENT"},
 *     @OA\Schema(type="string", example="BUY")
 *   ),
 *   @OA\Property(
 *     property="surface_min", description="",
 *     @OA\Schema(type="number", example="42")
 *   ),
 *   @OA\Property(
 *     property="number_rooms", description="",
 *     @OA\Schema(type="number", example="3")
 *   ),
 *   @OA\Property(
 *     property="budget_min", description="",
 *     @OA\Schema(type="number", example="50000")
 *   ),
 *   @OA\Property(
 *     property="budget_max", description="",
 *     @OA\Schema(type="number", example="200000")
 *   ),
 *   @OA\Property(
 *     property="search_longitude", description="",
 *     @OA\Schema(type="number", example="8547858")
 *   ),
 *   @OA\Property(
 *     property="search_latitude", description="",
 *     @OA\Schema(type="number", example="2986846")
 *   ),
 *   @OA\Property(
 *     property="search_radius", description="",
 *     @OA\Schema(type="number", example="12")
 *   ),
 *   @OA\Property(
 *     property="created_at", description="Date of created",
 *     @OA\Schema(type="date", example="16-06-1994")
 *   ),
 *   @OA\Property(
 *     property="updated_at", description="Date of updated",
 *     @OA\Schema(type="date", example="18-01-2008")
 *   ),
 *   @OA\Property(
 *     property="alert", description="if there is a password change request",
 *     @OA\Schema(type="boolean", example="0")
 *   ),
 *   @OA\Property(
 *     property="id_customer", description="ID of the customer",
 *     @OA\Schema(type="integer", example=2)
 *   ),
 *   @OA\Property(
 *     property="id_estate_type", description="ID of the estate type",
 *     @OA\Schema(type="integer", example=1)
 *   ),
 *  )
 * @method static find($id)
 * @method static findOrFail($id)
 * @method static create(array $array)
 * @method static where(string $string, $id_customer)
 */
class CustomersSearchs extends Model{

    use Authenticatable, Authorizable, HasFactory;

    protected $fillable = [
        'buy_or_rent',
        'surface_min',
        'number_rooms',
        'budget_min',
        'budget_max',
        'search_longitude',
        'search_latitude',
        'search_radius',
        'created_at',
        'updated_at',
        'alert',
        'id_customer',
        'id_estate_type',
    ];
}

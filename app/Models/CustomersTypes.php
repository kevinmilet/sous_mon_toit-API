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
 *      schema="CustomersTypes",
 *      title="CustomersTypes",
 *      description="CustomersTypes model",
 *      @OA\Property(
 *          property="id", description="ID of the Customers Types",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Property(
 *          property="customer_type", description="Name of the customer type",
 *          enum={"Acheteur", "Vendeur", "Bailleur","Loueur"},
 *          @OA\Schema(type="string", example="Acheteur")
 *      ),
 *  )
 * @method static find($id)
 */
class CustomersTypes extends Model{

    use Authenticatable, Authorizable, HasFactory;

     protected $fillable = [
         'customer_type'
     ];

   
}

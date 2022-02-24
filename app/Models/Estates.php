<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

/**
 * @method static find($id)
 * @method static findOrFail($id)
 * @method static create(array $array)
 * @method static update(array $array)
 * 
 *  @OA\Schema(
 *   schema="Estates",
 *   title="Estates",
 *   description="Estates model",
 *   @OA\Property(
 *     property="id", description="ID of the estate",
 *     @OA\Schema(type="number", example=1)
 *   ),
 *   @OA\Property(
 *     property="id_estate_type", description="",
 *     @OA\Schema(type="number", example=3)
 *   ),
 *   @OA\Property(
 *     property="id_customer", description="Id of the seller",
 *     @OA\Schema(type="number", example=1)
 *   ),
 *   @OA\Property(
 *     property="title", description="",
 *     @OA\Schema(type="string", example="Petite maison dans la prairie")
 *   ),
 *   @OA\Property(
 *     property="reference", description="",
 *     @OA\Schema(type="string", example="mde8548")
 *   ),
 *   @OA\Property(
 *     property="dpe_file", description="",
 *     @OA\Schema(type="string", example="name.extension")
 *   ),
 *   @OA\Property(
 *     property="buy_or_rent", description="it is a property for sale or a property for rent",
 *     enum={"BUY", "RENT"},
 *     @OA\Schema(type="string", example="BUY")
 *   ),
 *   @OA\Property(
 *     property="address", description="",
 *     @OA\Schema(type="string", example="58 rue Lamartine")
 *   ),
 *   @OA\Property(
 *     property="city", description="",
 *     @OA\Schema(type="string", example="Amiens")
 *   ),
 *   @OA\Property(
 *     property="zipcode", description="",
 *     @OA\Schema(type="string", example="80000")
 *   ),
 *   @OA\Property(
 *     property="estate_longitude", description="",
 *     @OA\Schema(type="number", example="8846513")
 *   ),
 *   @OA\Property(
 *     property="estate_latitude", description="",
 *     @OA\Schema(type="number", example="9135513")
 *   ),
 *   @OA\Property(
 *     property="price", description="",
 *     @OA\Schema(type="number", example="120000")
 *   ),
 *   @OA\Property(
 *     property="description", description="",
 *     @OA\Schema(type="string", example="Lorem ...")
 *   ),
 *   @OA\Property(
 *     property="disponibility", description="",
 *     @OA\Schema(type="date", example="28-08-2021")
 *   ),
 *   @OA\Property(
 *     property="year_of_construction", description="",
 *     @OA\Schema(type="number",minimum ="0", maximum="3000", example="1998")
 *   ),
 *   @OA\Property(
 *     property="living_surface", description="",
 *     @OA\Schema(type="integer", example="58")
 *   ),
 *   @OA\Property(
 *     property="carrez_law", description="",
 *     @OA\Schema(type="integer", example="56")
 *   ),
 *   @OA\Property(
 *     property="land_surface", description="",
 *     @OA\Schema(type="integer", example="58")
 *   ),
 *   @OA\Property(
 *     property="nb_rooms", description="",
 *     @OA\Schema(type="integer", example="56")
 *   ),
 *   @OA\Property(
 *     property="nb_bedrooms", description="",
 *     @OA\Schema(type="integer", example="56")
 *   ),
 *   @OA\Property(
 *     property="nb_bathrooms", description="",
 *     @OA\Schema(type="integer", example="56")
 *   ),
 *   @OA\Property(
 *     property="nb_sanitary", description="",
 *     @OA\Schema(type="integer", example="56")
 *   ),
 *   @OA\Property(
 *     property="nb_toilet", description="",
 *     @OA\Schema(type="integer", example="56")
 *   ),
 *   @OA\Property(
 *     property="nb_kitchen", description="",
 *     @OA\Schema(type="integer", example="56")
 *   ),
 *   @OA\Property(
 *     property="nb_garage", description="",
 *     @OA\Schema(type="integer", example="56")
 *   ),
 *   @OA\Property(
 *     property="nb_parking", description="",
 *     @OA\Schema(type="integer", example="56")
 *   ),
 *   @OA\Property(
 *     property="nb_balcony", description="",
 *     @OA\Schema(type="integer", example="56")
 *   ),
 *   @OA\Property(
 *     property="type_kitchen", description="",
 *     @OA\Schema(type="string", example="56")
 *   ),
 *   @OA\Property(
 *     property="heaters", description="",
 *     @OA\Schema(type="string", example="56")
 *   ),
 *   @OA\Property(
 *     property="communal_heating", description="",
 *     @OA\Schema(type="boolean", example="0")
 *   ),
 *   @OA\Property(
 *     property="furnished", description="",
 *     @OA\Schema(type="boolean", example="0")
 *   ),
 *   @OA\Property(
 *     property="private_parking", description="",
 *     @OA\Schema(type="boolean", example="0")
 *   ),
 *   @OA\Property(
 *     property="handicap_access", description="",
 *     @OA\Schema(type="boolean", example="0")
 *   ),
 *   @OA\Property(
 *     property="cellar", description="",
 *     @OA\Schema(type="boolean", example="0")
 *   ),
 *   @OA\Property(
 *     property="terrace", description="",
 *     @OA\Schema(type="boolean", example="0")
 *   ),
 *   @OA\Property(
 *     property="swimming_pool", description="",
 *     @OA\Schema(type="boolean", example="0")
 *   ),
 *   @OA\Property(
 *     property="fireplace", description="",
 *     @OA\Schema(type="boolean", example="0")
 *   ),
 *   @OA\Property(
 *     property="all_in_sewer", description="",
 *     @OA\Schema(type="boolean", example="0")
 *   ),
 *   @OA\Property(
 *     property="septik_tank", description="",
 *     @OA\Schema(type="boolean", example="0")
 *   ),
 *   @OA\Property(
 *     property="property_charge", description="",
 *     @OA\Schema(type="number", example="812")
 *   ),
 *   @OA\Property(
 *     property="attic", description="",
 *     @OA\Schema(type="boolean", example="0")
 *   ),
 *   @OA\Property(
 *     property="elevator", description="",
 *     @OA\Schema(type="boolean", example="1")
 *   ),
 *   @OA\Property(
 *     property="rental_charge", description="",
 *     @OA\Schema(type="number", example="599")
 *   ),
 *   @OA\Property(
 *     property="coownership_charge", description="",
 *     @OA\Schema(type="number", example="250")
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
 *     property="deleted_at", description="Date of archived",
 *     @OA\Schema(type="date", example="24-08-2021")
 *   ),
 * )
 */
class Estates extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $fillable = [
        'id',
        'id_estate_type',
        'id_customer',
        'title',
        'reference',
        'dpe_file',
        'buy_or_rent',
        'address',
        'city',
        'zipcode',
        'estate_longitude',
        'estate_latitude',
        'price',
        'description',
        'disponibility',
        'year_of_construction',
        'living_surface',
        'carrez_law',
        'land_surface',
        'nb_rooms',
        'nb_bedrooms',
        'nb_bathrooms',
        'nb_sanitary',
        'nb_toilet',
        'nb_kitchen',
        'nb_garage',
        'nb_parking',
        'nb_balcony',
        'type_kitchen',
        'heaters',
        'communal_heating',
        'furnished',
        'private_parking',
        'handicap_access',
        'cellar',
        'terrace',
        'swimming_pool',
        'fireplace',
        'all_in_sewer',
        'septik_tank',
        'property_charge',
        'attic',
        'elevator',
        'rental_charge',
        'coownership_charge',
    ];

    protected $hidden = [
    ];
}

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
        'nd_rooms',
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

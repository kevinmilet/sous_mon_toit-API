<?php
namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\SoftDeletes;

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
         'id_customer'
 
     ];
}

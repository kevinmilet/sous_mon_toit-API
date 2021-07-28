<?php
namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model{

    use Authenticatable, Authorizable, HasFactory,SoftDeletes;

    protected $fillable = [
            'n_customer' ,
            'firstname',
            'lastname' ,
            'gender',
            'mail' ,
            'phone',
            'password',
            'birthdate',
            'address' ,
            'created_at',
            'archived_at' ,
            'updated_at' ,
            'first_met',
            'token' ,
            'password_request'
    ];
}

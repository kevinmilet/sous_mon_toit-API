<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

/**
 * @method static find($id)
 */
class Pictures extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $fillable = [
        'id', 'folder', 'name', 'cover', 'alt', 'id_estate',
    ];

    protected $hidden = [
    ];


=======
use Illuminate\Database\Eloquent\Model;

class Pictures extends Model
{
>>>>>>> origin/ethan

}

<?php


namespace App\Models;


use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Lumen\Auth\Authorizable;

/**
 * @method static find($id)
 * @method static findOrFail($id)
 * @method static where(string $string, $id)
 * @method static create(array $array)
 * @method static update(array $array)
 */
class Staffs extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory, SoftDeletes;

    protected $fillable = [
        'id', 'login', 'firstname', 'lastname', 'created_at', 'updated_at', 'archived_at', 'mail', 'phone', 'password', 'avatar', 'alert_reader', 'id_function', 'id_role',
    ];

    protected $hidden = [
        'password',
    ];
}

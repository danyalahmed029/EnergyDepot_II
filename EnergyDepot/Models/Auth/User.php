<?php

namespace EnergyDepot\Models\Auth;

use EnergyDepot\Models\Company;
use EnergyDepot\Models\Order;
use EnergyDepot\Models\RoleType;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

/**
 * Class User
 * @package EnergyDepot\Models\Auth
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    /**
     * @var string
     */
    protected $primaryKey='uuid';
    /**
     * @var bool
     */
    public $incrementing=false;
    /**
     * @var array
     */
    protected $fillable = ['uuid','password','email','expiration_date','is_used','role_id','api_token'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roleType()
    {
        return $this->belongsTo(RoleType::class,'role_id','id');
    }


    public function pending()
    {
        return $this->hasMany(Order::class,'email','email')
            ->where('order_fullfiled','=',0)
            ->selectRaw('email, count(*) as count')->groupBy('email');
    }

    public function completeOrders()
    {
        return $this->hasMany(Order::class,'email','email')
            ->where('order_fullfiled','=',1)
            ->selectRaw('email, count(*) as count')->groupBy('email');
    }

    public function company()
    {
        return $this->hasOne(Company::class,'user_id','uuid');
    }
}

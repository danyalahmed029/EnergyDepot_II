<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 7/16/18
 * Time: 4:23 PM
 */

namespace EnergyDepot\Models;


use EnergyDepot\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';

    protected $primaryKey='uuid';

    public $incrementing=false;

    public function user(){
        return $this->hasOne(User::class,'email','email');
    }

    public function getOrderFullfiledAttribute($value)
    {
        if($value==true)
            return 'Completed';
        else
            return 'Pending';
    }
}
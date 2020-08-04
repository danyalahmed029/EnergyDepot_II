<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 7/16/18
 * Time: 4:27 PM
 */

namespace EnergyDepot\Models;


use Illuminate\Database\Eloquent\Model;

class PendingOrder extends Model
{
    protected $table='pending_orders';

    protected $primaryKey='uuid';

    public $incrementing=false;
}
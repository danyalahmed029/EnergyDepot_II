<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 7/2/18
 * Time: 11:56 AM
 */

namespace EnergyDepot\Models;

use EnergyDepot\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    use SoftDeletes;

    protected $table='companies';

    protected $primaryKey='uuid';

    public $incrementing=false;

    protected $fillable=['uuid','company_name','company_address','customer_name','customer_title','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','uuid');
    }
}

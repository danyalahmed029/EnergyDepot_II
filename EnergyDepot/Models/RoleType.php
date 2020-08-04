<?php namespace EnergyDepot\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\BinaryUuid\HasBinaryUuid;

/**
 * Class RoleType
 * @package EnergyDepot\Models
 */
class RoleType extends Model {

    /**
     * @var string
     */
    protected $table='role_types';

    /**
     * @var array
     */
    protected $fillable = ['role_type'];
}

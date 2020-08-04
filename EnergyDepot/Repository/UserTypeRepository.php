<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 7/4/18
 * Time: 3:58 PM
 */

namespace EnergyDepot\Repository;


use EnergyDepot\Models\RoleType;

/**
 * Class UserTypeRepository
 * @package EnergyDepot\Repository
 */
class UserTypeRepository implements RepositoryInterface
{


    /**
     * @return RoleType|null
     */
    public function all():?array
    {
        return RoleType::where('role_type','!=','ADMIN')->get()->toArray();
    }


    /**
     * @param array $data
     * @return RoleType
     */
    public function create(array $data):RoleType
    {
        $role=new RoleType();
        $role->role_type=$data->role_type;
        $role->save();
        return $role;
    }


    /**
     * @param array $data
     * @param string $id
     * @return RoleType
     */
    public function update(array $data, string $id):RoleType
    {
        $role=RoleType::where('id',$id)->first();
        $role->role_type=$data->role_type;
        $role->save();
        return $role;
    }


    /**
     * @param string $id
     * @return bool
     */
    public function delete(string $id):bool
    {
        return RoleType::where('id',$id)->delete;
    }


    /**
     * @param string $id
     * @return RoleType|null
     */
    public function show(string $id):?RoleType
    {
        return RoleType::where('id',$id)->first();
    }

    /**
     * @param string $type
     * @return RoleType|null
     */
    public function getType(string $type):?RoleType
    {
        return RoleType::where('role_type',$type)->first();
    }
}
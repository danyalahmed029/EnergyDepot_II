<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 6/11/18
 * Time: 10:32 AM
 */

namespace EnergyDepot\Repository;
use EnergyDepot\Models\Auth\User;
use EnergyDepot\Models\RoleType;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 * @package EnergyDepot\Repository
 */
class UserRepository implements RepositoryInterface
{


    public function __construct()
    {
    }


    /**
     * @return User|null
     */
    public function all() : ?User
    {
        return User::all();
    }


    /**
     * @param array $data
     * @return User
     */
    public function create(array $data) : User
    {
        $user = new User();
        $user->uuid = $data['uuid'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->expiration_date = $data['expiry'];
        $user->is_used = 0;
        $user->role_id = 2;
        $user->save();
        return $user;
    }


    /**
     * @param array $data
     * @param string $id
     * @return User
     */
    public function update(array $data, string $id): User
    {
        $user = User::where('uuid',$id)->first();
        $user->expiration_date=$data['expiry'];
        $user->is_used=0;
        $user->password=$data['password'];
        $user->save();

        return $user;
    }


    /**
     * @param string $token
     * @param string $id
     * @return User
     */
    public function updateToken(string $token, string $id): User
    {
        $record = User::where('uuid',$id)->first();
        $record->is_used=1;
        $record->api_token=$token;
        $record->save();
        $record->load('roleType');
        return $record;
    }


    /**
     * @param string $id
     * @return bool
     */
    public function delete(string $id): bool
    {
        return User::where('uuid',$id)->delete();
    }


    /**
     * @param string $id
     * @return User|null
     */
    public function show(string $id): ?User
    {
        return User::where('uuid',$id)->first();
    }


    /**
     * @param string $email
     * @return User|null
     */
    public function getUser(string $email): ?User
    {
        $user = User::where('email',$email)->first();
        if($user!=null)
            $user->load('roleType');
        return $user;
    }


    /**
     * @param $password
     * @param $userPassword
     * @return bool
     */
    public function verifyPin($password, $userPassword)
    {
        return Hash::check($password,$userPassword);
    }


    /**
     * @param int $role_id
     * @param string $id
     * @return User
     */
    public function updateRole(int $role_id, string $id):User
    {
        $user = User::where('uuid',$id)->first();
        $user->role_id=$role_id;
        $user->save();
        return $user;
    }

    /**
     * @return array|null
     */
    public function getAdminUsers():?array
    {
        $user=User::where('role_id','!=',1)->get();
        $user->load(['roleType','pending','completeOrders','company']);
        return $user->toArray();
    }

    /**
     * @param string $uuid
     * @return User
     */
    public function activateUser(string $uuid):User
    {
        $type=RoleType::where('role_type','ACTIVE_USER')->first();
        $user=User::where('uuid',$uuid)->first();
        $user->role_id=$type->id;
        $user->save();
        return $user;
    }

}
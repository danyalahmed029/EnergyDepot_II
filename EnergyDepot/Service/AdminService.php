<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 7/18/18
 * Time: 12:53 PM
 */

namespace EnergyDepot\Service;


use EnergyDepot\Mail\ApprovalEmailEvent;
use EnergyDepot\Repository\OrderRepository;
use EnergyDepot\Repository\UserRepository;
use EnergyDepot\Repository\UserTypeRepository;
use Illuminate\Support\Facades\Mail;

/**
 * Class AdminService
 * @package EnergyDepot\Service
 */
class AdminService
{
    protected $order;
    protected $user;
    protected $type;

    public function __construct(OrderRepository $order,UserRepository $user,UserTypeRepository $type)
    {
        $this->order=$order;
        $this->user=$user;
        $this->type=$type;
    }

    /**
     * @return array|null
     */
    public function getAllOrders():?array
    {
        return $this->order->getAdminOrders();
    }

    /**
     * @return array|null
     */
    public function getAllUsers():?array
    {
        return $this->user->getAdminUsers();
    }

    /**
     * @return array|null
     */
    public function getAllTypes():?array
    {
        return $this->type->all();
    }

    /**
     * @param string $uuid
     * @return array|null
     */
    public function activateUser(string $uuid):?array
    {
        $user = $this->user->activateUser($uuid);
        $userEmail=$user->email;
        Mail::to($userEmail)->send(new ApprovalEmailEvent());
        return $this->user->getAdminUsers();
    }

    /**
     * @param string $uuid
     * @return array|null
     */
    public function deleteUser(string $uuid):?array
    {
        $this->user->delete($uuid);
        return $this->getAllUsers();
    }

    /**
     * @param string $uuid
     * @return array|null
     */
    public function deleteOrder(string $uuid):?array
    {
        $this->order->delete($uuid);
        return $this->getAllOrders();
    }

}
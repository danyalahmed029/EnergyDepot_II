<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 7/17/18
 * Time: 12:25 PM
 */

namespace EnergyDepot\Service;


use EnergyDepot\Repository\OrderRepository;
use EnergyDepot\Repository\PendingOrderRepository;
use Webpatser\Uuid\Uuid;

class OrderService
{
    protected $pendingOrder;
    protected $order;

    /**
     * OrderService constructor.
     * @param OrderRepository $order
     * @param PendingOrderRepository $pendingOrder
     */
    public function __construct(OrderRepository $order, PendingOrderRepository $pendingOrder)
    {
        $this->pendingOrder = $pendingOrder;
        $this->order = $order;
    }

    /**
     * @param array $data
     * @return array|null
     */
    public function placeOrder(array $data):?array
    {
        $data['uuid'] = Uuid::generate()->string;
        for ($x=0;$x<count($data['data']);$x++)
        {
            $this->pendingOrder->delete($data['data'][$x]['uuid']);
        }
        return $this->order->create($data)->toArray();
    }


    /**
     * @param string $email
     * @return array|null
     */
    public function getOrder(string $email):?array
    {
        return $this->order->getOrder($email)->toArray();
    }

    /**
     * @param string $emial
     * @return array|null
     */
    public function loadCart(string $emial):?array
    {
        return $this->pendingOrder->all();
    }

}
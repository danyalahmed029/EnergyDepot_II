<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 7/16/18
 * Time: 4:32 PM
 */

namespace EnergyDepot\Repository;


use Carbon\Carbon;
use EnergyDepot\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository implements RepositoryInterface
{


    /**
     * @return array|null
     */
    public function all():?array
    {
        return Order::all()->toArray();
    }


    /**
     * @param array $data
     * @return Order
     */
    public function create(array $data):Order
    {
       $order=new Order();
       $order->uuid=$data['uuid'];
       $order->email=$data['email'];
       $order->search_criterias=$data['search_criteria'];
       $order->total_price=$data['totalPrice'];
       $order->delivery_type=$data['deliverytype'];
       $order->order_date=Carbon::now()->toDateTimeString();
       $order->save();
       return $order;
    }


    /**
     * @param array $data
     * @param string $id
     * @return Order
     */
    public function update(array $data, string $id):Order
    {
        $order=Order::where('uuid',$id)->first();
        $order->email=$data['email'];
        $order->search_criterias=$data['searchCriteria'];
        $order->total_price=$data['totalPrice'];
        $order->delivery_type=$data['deliverytype'];
        $order->save();
        return $order;
    }


    /**
     * @param string $id
     * @return bool
     */
    public function delete(string $id):bool
    {
       return Order::where('uuid',$id)->delete();
    }


    /**
     * @param string $id
     * @return Order|null
     */
    public function show(string $id):?Order
    {
        return Order::where('uuid',$id)->first();
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function getOrder(string $email)
    {
        return Order::where('email',$email)->get();
    }


    /**
     * @return array|null
     */
    public function getAdminOrders():?array
    {
        $orders=Order::all();
        $orders->load('user');
        return $orders->toArray();
    }
}
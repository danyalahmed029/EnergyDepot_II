<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 7/16/18
 * Time: 5:34 PM
 */

namespace EnergyDepot\Repository;


use EnergyDepot\Models\PendingOrder;

/**
 * Class PendingOrderRepository
 * @package EnergyDepot\Repository
 */
class PendingOrderRepository implements RepositoryInterface
{


    /**
     * @return array|null
     */
    public function all():?array
    {
       return PendingOrder::all()->toArray();
    }


    /**
     * @param array $data
     * @return PendingOrder
     */
    public function create(array $data):PendingOrder
    {
        $pendingOrder=new PendingOrder();
        $pendingOrder->uuid=$data['uuid'];
        $pendingOrder->email=$data['email'];
        $pendingOrder->search_criteria=$data['search_criteria'];
        $pendingOrder->price=$data['price'];
        $pendingOrder->save();
        return $pendingOrder;
    }


    /**
     * @param array $data
     * @param string $id
     * @return PendingOrder
     */
    public function update(array $data, string $id):PendingOrder
    {
        $pendingOrder=PendingOrder::where('uuid',$id)->first();
        $pendingOrder->email=$data['email'];
        $pendingOrder->search_criteria=$data['search_criteria'];
        $pendingOrder->price=$data['price'];
        $pendingOrder->save();
        return $pendingOrder;
    }


    /**
     * @param string $id
     * @return bool
     */
    public function delete(string $id):bool
    {
        return PendingOrder::where('uuid',$id)->delete();
    }


    /**
     * @param string $id
     * @return PendingOrder|null
     */
    public function show(string $id):?PendingOrder
    {
        return PendingOrder::where('uuid',$id)->first();
    }
}
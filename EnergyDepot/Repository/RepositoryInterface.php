<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 6/11/18
 * Time: 10:53 AM
 */

namespace EnergyDepot\Repository;


/**
 * Interface RepositoryInterface
 * @package EnergyDepot\Repository
 */
/**
 * Interface RepositoryInterface
 * @package EnergyDepot\Repository
 */
interface RepositoryInterface
{


    /**
     * @return mixed
     */
    public function all();


    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);


    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data,string $id);

    /**
     * @param $id
     * @return mixed
     */
    public function delete(string $id);

    /**
     * @param $id
     * @return mixed
     */
    public function show(string $id);
}
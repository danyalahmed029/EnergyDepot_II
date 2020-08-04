<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 7/2/18
 * Time: 12:09 PM
 */

namespace EnergyDepot\Repository;


use EnergyDepot\Models\Company;

/**
 * Class CompanyRepository
 * @package EnergyDepot\Repository
 */
class CompanyRepository implements RepositoryInterface
{
    public function __construct()
    {

    }


    /**
     * @return Company|null
     */
    public function all():?Company
    {
        return Company::all();
    }

    /**
     * @param array $data
     * @return Company
     */
    public function create(array $data):Company
    {
        $company=new Company();
        $company->uuid=$data['uuid'];
        $company->company_name=$data['companyName'];
        $company->company_address=$data['companyAddress'];
        $company->customer_name=$data['customerName'];
        $company->customer_title=$data['customerTitle'];
        $company->user_id=$data['userId'];
        $company->save();
        return $company;

    }


    /**
     * @param array $data
     * @param string $id
     * @return Company
     */
    public function update(array $data, string $id):Company
    {
        $company=Company::where('uuid',$id)->first();
        $company->company_name=$data['companyName'];
        $company->company_address=$data['companyAddress'];
        $company->customer_name=$data['customerName'];
        $company->customer_title=$data['customerTitle'];
        $company->user_id=$data['userId'];
        $company->save();
        return $company;
    }

    /**
     * @param string $id
     * @return bool
     */
    public function delete(string $id):bool
    {
        return Company::where('uuid',$id)->delete();
    }


    /**
     * @param string $id
     * @return Company|null
     */
    public function show(string $id):?Company
    {
        return Company::where('uuid',$id)->first();
    }

    /**
     * @param string $contract
     * @param string $user_id
     * @return Company
     */
    public function updateContract(string $contract, string $user_id):Company
    {
        $company=Company::where('user_id',$user_id)->first();
        $company->contract_file=$contract;
        $company->save();
        return $company;
    }

    /**
     * @param string $userId
     * @return Company|null
     */
    public function checkCompany(string $userId):?Company
    {
        return Company::where('user_id',$userId)->first();
    }
}
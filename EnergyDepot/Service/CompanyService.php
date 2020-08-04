<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 7/2/18
 * Time: 12:43 PM
 */

namespace EnergyDepot\Service;


use EnergyDepot\Lib\FillPdfException;
use EnergyDepot\Lib\UserNotExistException;
use EnergyDepot\Repository\CompanyRepository;
use EnergyDepot\Repository\UserRepository;
use EnergyDepot\Repository\UserTypeRepository;
use Illuminate\Support\Facades\Storage;
use mikehaertl\pdftk\Pdf;
use Webpatser\Uuid\Uuid;

class CompanyService
{
    protected $companyRepository;
    protected $userRepository;
    protected $userTypeRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository=$companyRepository;
    }


    /**
     * @param array $data
     * @return array|null
     * @throws FillPdfException
     * @throws \Exception
     */
    public function addCompanyDetails(array $data):?array
    {
        try {
            $checkCompany=$this->companyRepository->checkCompany($data['userId']);
            if($checkCompany==null) {
                $data['uuid'] = Uuid::generate()->string;
                $companyDetails = $this->companyRepository->create($data);
            }
            else
            {
                $companyDetails=$this->companyRepository->update($data,$checkCompany->uuid);
            }

            $path = base_path() . '/public/pdf/';
            $random = str_random(6);
            $pdf = new Pdf($path . 'output.pdf');
            $pdf->fillForm([
                'Customer Name' => $companyDetails->customer_name,
                'Customer title' => $companyDetails->customer_title,
                'Company Name' => $companyDetails->company_name,
                'Company Address' => $companyDetails->company_address,
                'Company Name2' => $companyDetails->company_name,
                'Company Address2' => $companyDetails->company_address,
                'Company Name3' => $companyDetails->company_name,
                'Company Address3' => $companyDetails->company_address,
                'Company Name4' => $companyDetails->company_name,
                'Company Address4' => $companyDetails->company_address,
                'Effective Date' => $companyDetails->created_at->format('Y-m-d')
            ])
                ->needAppearances()
                ->saveAs($path . $random . '.pdf');

            if (!$pdf->saveAs($path . $random . '.pdf')) {
                throw new FillPdfException("Pdf not filled and saved. ".$pdf->getError());
            }
            return ['company' => $companyDetails->toArray(), 'url' => 'pdf/' . $random . '.pdf'];
        }
        catch (FillPdfException $ex)
        {
            throw $ex;
        }
    }


    /**
     * @param $data
     * @return array|null
     * @throws UserNotExistException
     */
    public function uploadPdf($data):?array
    {
        try {
            $this->userRepository = new UserRepository();
            $user = $this->userRepository->show($data["uuid"]);

            if (isset($user)) {
                $this->userTypeRepository = new UserTypeRepository();
                $roleType = $this->userTypeRepository->getType("PENDING_APPROVAL");
                $user["role_id"] = $roleType->id;
                if ($data->hasFile('file')) {
                    $path = base_path().'/public/';
                    $contract='contracts/'.str_random(6).'.pdf';
                    file_put_contents($path.$contract,file_get_contents($data->file));
                    $userUpdate = $this->userRepository->updateRole($roleType["id"], $data["uuid"]);
                    $company = $this->companyRepository->updateContract($contract, $userUpdate->uuid);
                    return [$company,$userUpdate];
                }
            }
            throw new UserNotExistException("User does not exist");
        }
        catch (UserNotExistException $ex)
        {
            throw $ex;
        }
    }
}
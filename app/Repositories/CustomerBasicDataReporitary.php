<?php
namespace App\Repositories;


use App\Repositories\RepositoryInterfaces\CustomerBasicDataReporitaryInterface;
use App\Models\CustomerBasicData;

class CustomerBasicDataReporitary implements CustomerBasicDataReporitaryInterface
{
    private $customerBasicDataModel;

    public function __construct(CustomerBasicData $customerBasicDataModel)
    {
        $this->customerBasicDataModel = $customerBasicDataModel;
    }
    public function insert($data){

        $this->$customerBasicDataModel->insert($data);

    }

}

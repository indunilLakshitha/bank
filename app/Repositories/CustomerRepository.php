<?php
namespace App\Repositories;


use App\Repositories\RepositoryInterfaces\CustomerRepositoryInterface;
use App\Models\CustomerModel;

class CustomerRepository implements CustomerRepositoryInterface
{
    private $customerModel;

    public function __construct(CustomerModel $customerModel)
    {
        $this->customerModel = $customerModel;
    }

    public function getCustomer($customer_id)
    {
        $customer_data = [];
        //return Customer::find($customer_id);
        return $customer_data;
    }


    public function getAllCustomer($input_data)
    {
        $customers_data = $this->customerModel->getAllCustomer($input_data);
        return $customers_data;
    }


    public function deleteCustomer($customer_id)
    {
        $delete_customer_data = [];
        //Post::destroy($customer_id);
        return $delete_customer_data;
    }

  
    public function manageCustomer($customer_data)
    {
        if (isset($customer_data['customer_id'])) {
            $manage_customer_data = $this->customerModel->updateCustomer($customer_data);
        } else {
            $manage_customer_data = $this->customerModel->addCustomer($customer_data);
        }

        return $manage_customer_data;
    }
}

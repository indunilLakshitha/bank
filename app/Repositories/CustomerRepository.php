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
    /**
     * Get's a customer by customer ID
     * @param int $customer_id
     * @return mixed
     */
    public function getCustomer($customer_id)
    {
        $customer_data = [];
        //return Customer::find($customer_id);
        return $customer_data;
    }

    /**
     * Get's all active customers.
     * @param string $input_data
     * @return mixed
     */
    public function getAllCustomer($input_data)
    {
        $customers_data = $this->customerModel->getAllCustomer($input_data);
        return $customers_data;
    }

    /**
     * Deletes a customer by customer id.
     * @param int
     * @return mixed
     */
    public function deleteCustomer($customer_id)
    {
        $delete_customer_data = [];
        //Post::destroy($customer_id);
        return $delete_customer_data;
    }

    /**
     * Create or Updates a customer.
     * @param array $customer_data
     * @return mixed
     */
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

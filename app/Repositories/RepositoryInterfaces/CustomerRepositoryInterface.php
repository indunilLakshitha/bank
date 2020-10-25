<?php
namespace App\Repositories\RepositoryInterfaces;

interface CustomerRepositoryInterface
{
    /**
     * Get's a customer by customer ID
     * @param int $customer_id
     * @return mixed
     */
    public function getCustomer($customer_id);

    /**
     * Get's all active customers.
     * @param string $input_data
     * @return mixed
     */
    public function getAllCustomer($input_data);

    /**
     * Deletes a customer by customer id.
     * @param int
     * @return mixed
     */
    public function deleteCustomer($customer_id);

    /**
     * Create or Updates a customer.
     * @param array $customer_data
     * @return mixed
     */
    public function manageCustomer($customer_data);
}

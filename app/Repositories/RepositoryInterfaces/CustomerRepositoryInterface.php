<?php
namespace App\Repositories\RepositoryInterfaces;

interface CustomerRepositoryInterface
{

    public function getCustomer($customer_id);

    public function getAllCustomer($input_data);

    public function deleteCustomer($customer_id);

    public function manageCustomer($customer_data);
}

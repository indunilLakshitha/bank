<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RepositoryInterfaces\CustomerRepositoryInterface;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }


    public function getAllCustomer(Request $request)
    {
        $input_data = $request->input();
        $output_data = $this->customerRepository->getAllCustomer($input_data);
        return json_encode($output_data);
    }

    public function manageCustomer(Request $request) {
        $input_data = $request->input();
        $output_data = $this->customerRepository->manageCustomer($input_data);
        return json_encode($output_data);
    }
}

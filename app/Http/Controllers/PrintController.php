<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use PDF;

class PrintController extends Controller
{
    public function receipt($id)
    {
        $data = DB::table('customer_basic_data')
            ->leftjoin('account_types', 'customer_basic_data.sub_account_office_id', 'account_types.id')
            ->where('customer_basic_data.id', $id)
            ->select('customer_basic_data.created_at', 'customer_basic_data.customer_id', 'customer_basic_data.short_name', 'account_types.account_type')
            ->get();
        // return $data;
        $pdf = PDF::loadView('prints.reciept', compact('data'))->setPaper('a4', 'portrait');
        $fileName = $data[0]->short_name;
        return $pdf->stream($fileName . '.pdf');

    }

    public function passbookFront($id)
    {
        $data = DB::table('customer_basic_data')
            ->leftjoin('account_types', 'customer_basic_data.sub_account_office_id', 'account_types.id')
            ->leftJoin('address_data', 'customer_basic_data.customer_id', 'address_data.customer_id')
            ->leftJoin('branches', 'customer_basic_data.branch_id', 'branches.id')
            ->where('customer_basic_data.id', $id)
            ->select('customer_basic_data.short_name', 'customer_basic_data.identification_number', 'account_types.account_type', 'branches.branch_name',
                'address_data.address_line_1', 'address_data.address_line_2', 'address_data.address_line_3', 'address_data.address_line_4', )
            ->get();
        // return $data;

        $pdf = PDF::loadView('prints.passbookFront', compact('data'))->setPaper('a4', 'portrait');
        $fileName = $data[0]->short_name;
        return $pdf->stream($fileName . '.pdf');

    }

    public function FDreceipt()
    {

        $pdf = PDF::loadView('prints.FDreceipt')->setPaper('a4', 'portrait');
        $fileName = $data[0]->test;
        return $pdf->stream($fileName . '.pdf');
    }

    public function passbookBack()
    {
        $pdf = PDF::loadView('prints.passbookBack')->setPaper('a4', 'portrait');
        return $pdf->stream('passbook back' . '.pdf');

    }
}

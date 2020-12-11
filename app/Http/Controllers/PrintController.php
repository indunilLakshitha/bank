<?php

namespace App\Http\Controllers;

use App\Models\FdAccountGeneralInformation;
use App\Models\TransactionData;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use NumberFormatter;
use PDF;

class PrintController extends Controller
{
    public function __construct()
    {

        date_default_timezone_set('Asia/Colombo');

    }
    public function receipt($id)
    {
         $data = DB::table('account_general_information')
            ->leftjoin('customer_basic_data', 'customer_basic_data.customer_id', 'account_general_information.customer_id')
            ->leftjoin('transaction_data', 'transaction_data.account_id', 'account_general_information.account_number')
            ->where('account_general_information.account_number', $id)
            // ->where('transaction_data.created_by',Auth::user()->id)
            ->select('customer_basic_data.created_at', 'customer_basic_data.customer_id',
                    'customer_basic_data.short_name', 'account_general_information.account_number',
                    'customer_basic_data.full_name'
            )
            ->get();
         $trans=TransactionData::where('created_by',Auth::user()->id)->where('account_id',$id)->orderBy('id','desc')->first();
            $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
            $amountSpell = ucwords($digit->format($trans->transaction_value));
             $pdf = PDF::loadView('prints.reciept', compact('data','amountSpell','trans'))->setPaper('a4', 'portrait');
        $fileName = $data[0]->short_name;
        return $pdf->stream($fileName . '.pdf');

    }

    public function passbookFront($id)
    {
        $data = DB::table('account_general_information')
            ->leftjoin('product_data', 'product_data.account_id', 'account_general_information.id')
            ->leftJoin('customer_basic_data', 'customer_basic_data.customer_id', 'account_general_information.customer_id')
            ->leftJoin('address_data', 'customer_basic_data.customer_id', 'account_general_information.customer_id')
            ->leftJoin('branches', 'customer_basic_data.branch_id', 'product_data.id')
            ->leftJoin('sub_accounts', 'sub_accounts.id', 'product_data.product_type_id')
            ->where('account_general_information.account_number', $id)
            ->select('customer_basic_data.full_name', 'customer_basic_data.identification_number',
                'branches.branch_name',
                'address_data.address_line_1', 'address_data.address_line_2',
                'address_data.address_line_3', 'address_data.address_line_4',
                'account_general_information.customer_id', 'account_general_information.account_number','sub_accounts.sub_account_description')
            ->get();
        // return $data;

        $pdf = PDF::loadView('prints.passbookFront', compact('data'))->setPaper('a4', 'portrait');
        $fileName = $data[0]->full_name;
        return $pdf->stream($fileName . '.pdf');

    }

    public function FDreceipt($id)
    {

        $accounts = FdAccountGeneralInformation::leftjoin('customer_basic_data', 'customer_basic_data.customer_id', 'fd_account_general_information.customer_id')
            ->select('customer_basic_data.*', 'fd_account_general_information.*', 'fd_account_general_information.id as fd_id')
            ->where('fd_account_general_information.account_id', $id)
            ->get();
            if($accounts[0]->is_print_enabled=="1"){
                $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                $amountSpell = ucwords($digit->format($accounts[0]->deposite_amount));
                $pdf = PDF::loadView('prints.FDreceipt', compact('accounts','amountSpell'))->setPaper('a4', 'portrait');
                $fileName = $accounts[0]->account_number;
                FdAccountGeneralInformation::where('fd_account_general_information.account_id', $id)->update(['is_print_enabled'=>0]);
               return  $pdf->stream($fileName . '.pdf', array("Attachment" => false));
            // $file=$fileName.'.pdf';
            // return new Response($pdf, 200, [
            //     'Content-Type' => 'application/pdf',
            //    'Content-Disposition' =>  'inline; filename='$file'',
            //  ]);
                //  exit(0);
            }
return redirect()->back();
    }

    public function passbookBack()
    {
        $pdf = PDF::loadView('prints.passbookBack')->setPaper('a4', 'portrait');
        return $pdf->stream('passbook back' . '.pdf');

    }
}

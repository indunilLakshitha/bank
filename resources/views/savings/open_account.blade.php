@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Savings Account Opening</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <form method="get" action="/" class="form-horizontal">
                        <div class="row">
                            <label class="col-sm-2 col-form-label">CIF</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Client Full Name</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col">
                                <label class="col-form-label">Identification Type</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="" id="" class="form-control">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label class=" col-form-label"> Identification No</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h5>Client Details</h5>
                        <div class="row ">
                            <div class="col">
                                <label class=" col-form-label"> Customer Full Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label">Customer Type</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="" id="" class="form-control">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">CIF</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">DOB</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label class="col-form-label">Customer FATCA Clearance Received</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="" id="" class="form-control">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label">Customer PEP Clearance Received</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="" id="" class="form-control">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br> <br>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Branch Code</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Customer Rating</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Customer Signature</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="file" class="form-control">
                                </div>
                            </div>
                        </div>

                        <br> <br>
                        <h5>General Information</h5>

                        <div class="row">
                            <div class="col">
                                <label class="col-form-label">Lead source Category</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="" id="" class="form-control">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label">Account Description</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label class="col-form-label">Lead source Identification</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label">Account Category</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="" id="" class="form-control">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label class="col-form-label">Account Type</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="" id="" class="form-control">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label">Account Category</label>
                                <br>
                                <input type="checkbox" name="" id=""> ATM
                                <input type="checkbox" name="" id=""> SMS
                                <input type="checkbox" name="" id=""> Internet Banking
                                <input type="checkbox" name="" id=""> Mobile Banking
                            </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label class="col-form-label">Account Maintenance Via</label>
                            <br>
                            {{-- <div class="form-group"> --}}
                            <div class="col-sm-10">
                                <input type="checkbox" name="" id="" class="form-control"> Account Statement
                                <input type="checkbox" name="" id="" class="form-control"> Passbook
                                {{-- </div> --}}
                            </div>
                        </div> <br><br>

                        <h5>Product Details</h5>

                        <div class="row">
                            <div class="col-6">

                                <div class="row form-group">
                                    <label class=" col-form-label">Sub Product Type</label>
                                    <div class="col-sm-10">
                                        {{-- <div class="form-group"> --}}
                                            <select name="" id="" class="form-control">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                            </select>
                                        {{-- </div> --}}
                                    </div>
                                </div> <br>

                                <div class="row form-group">
                                    <label class=" col-form-label">Interest Type</label>
                                    <div class="col-sm-10">
                                        {{-- <div class="form-group"> --}}
                                            <select name="" id="" class="form-control">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                            </select>
                                        {{-- </div> --}}
                                    </div>
                                </div> <br>

                                <div class="row form-group">
                                    <label class=" col-form-label">Currency</label>
                                    <div class="col-sm-10">
                                        {{-- <div class="form-group"> --}}
                                            <select name="" id="" class="form-control">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                            </select>
                                        {{-- </div> --}}
                                    </div>
                                </div> <br>

                            </div>
                            <div class="col-6">
                                <label for="">Parameter can override at Account Level</label>
                                    <input type="checkbox" name="" id="" >

                                <div class="row form-group">
                                    <div class="col">
                                        <label for="">Initial Deposit Allow Mode</label>
                                    </div>
                                    <div class="col ">
                                        <select name="" id="" class="form-control">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col">
                                        <label for="">Interest Credit Dated</label>
                                    </div>
                                    <div class="col ">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col">
                                        <label for="">Minimum Balance to active the account</label>
                                    </div>
                                    <div class="col ">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div> <br><br>

                        <h5>Joint Account</h5>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Main Holder</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">Other Holders</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">

                                        <div class="row">
                                            <label for="">Identification Type</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                            </select>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label"> Main Holder</label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label"> Identification No</label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label"> Ownership Percentage</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"> Other Holder Signature</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br><br>

                        <h5>Operating Instructions</h5>

                        <div class="row">
                            <label class=" col-form-label">Minimum Authorization Required for a Withdrawal</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-form-label"> Withdrawal Limit for Holder</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class=" col-form-label"> Number of Holders</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-12 col-12 mr-auto ml-auto">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card card-wizard" data-color="rose" id="wizardProfile">
                    <form action="" method="">
                        <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                        <div class="card-header text-center">
                            <h3 class="card-title">
                                Member Declaration
                            </h3>
                            <h5 class="card-description">This information will let us know more about you.</h5>
                        </div>
                        <div class="wizard-navigation">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#private_1" data-toggle="tab" role="tab">
                                        Private - 1
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#status_and_dates" data-toggle="tab" role="tab">
                                        Status and Dates
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#occupation" data-toggle="tab" role="tab">
                                        Occupation
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#other_societies" data-toggle="tab" role="tab">
                                        Other Societies
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#bene_gurad" data-toggle="tab" role="tab">
                                        Benefic. / Guardiance
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#special" data-toggle="tab" role="tab">
                                        Special & Assets
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#resi_and_other" data-toggle="tab" role="tab">
                                        Residence and Other
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="private_1">
                                    {{-- <h5 class="info-text"> Let's start with the basic information (with validation)</h5> --}}
                                    <div class="row justify-content-center">
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="form-group">
                                                    <label for="">Code</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <div class="row">
                                                    <button class="btn btn-primary btn-sm">Select</button>
                                                    <button class="btn btn-primary btn-sm">Cat</button>
                                                    <button class="btn btn-primary btn-sm">==></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="form-group">
                                                    <label for="">Active ? </label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Ttile</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                {{-- <input type="text" class="form-control"> --}}
                                                <select name="" id="" class="form-control">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Name in Use</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Fullname</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Surname</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Short Name</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Main Type</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <select name="" id="" class="form-control">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label label-checkbox">Type(s)</label>
                                        <div class="col-sm-10 checkbox-radios">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Non Member
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Member
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Guarantor
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Supplier
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Customer
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Child
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Introducer
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <select name="" id="" class="form-control">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">New</button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Small Gr./ Acc.Off</label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">Select</button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Acc. Office Sub No.</label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">==></button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Sub Account Office</label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">Select</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">ID No</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                                <input type="text" class="form-control">
                                                <input type="text" class="form-control">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Telephone No</label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Fax</label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Ends Private 1 --}}

                                <div class="tab-pane" id="status_and_dates">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Birth Date / Nic Date</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Religion</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <select name="" id="" class="form-control">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <select name="" id="" class="form-control">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Date Became Member</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Joined Date</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Expired Date</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Exit Date</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Death Date</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Neglection Starting Date</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- ENds status and dates --}}

                                <div class="tab-pane" id="occupation">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Employee at Society</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <select name="" id="" class="form-control">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Designation</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                                <input type="text" class="form-control">
                                                <input type="text" class="form-control">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">EPF No</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- occupation ends --}}

                                <div class="tab-pane" id="other_societies">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Other Memberships</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <textarea class="form-control" name="" id="" cols="70" rows="8"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Curr. Designation</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Previous Designation</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <textarea class="form-control" name="" id="" cols="70" rows="8"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- other_societies ends --}}

                                <div class="tab-pane" id="bene_gurad">
                                    <h5 class="text-center">Beneficiaries</h5>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label">1st</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">Select</button>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label">2st</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">Select</button>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label">3st</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">Select</button>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label">4st</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">Select</button>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label">5st</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">Select</button>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label">6st</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">Select</button>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <h5 class="text-center">Guardians</h5>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label">1st</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">Select</button>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label">2st</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">Select</button>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label">3st</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">Select</button>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label">4st</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">Select</button>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label">5st</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">Select</button>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label">6st</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">Select</button>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                {{-- bene_gurad ends --}}

                                <div class="tab-pane" id="special">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Special Information</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <textarea class="form-control" name="" id="" cols="70" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Real Member</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <select name="" id="" class="form-control">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h5 class="text-center">Assets</h5>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Item</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Value</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <select name="" id="" class="form-control">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">Insert</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                {{-- special and assets ends --}}

                                <div class="tab-pane" id="resi_and_other">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Land MArks to Residence</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <textarea class="form-control" name="" id="" cols="70" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Sector</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <select name="" id="" class="form-control">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Secret No.</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h5 class="text-center">Other</h5>
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <h5 class="text-center">If a Society</h5>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Secret No.</label>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <select name="" id="" class="form-control">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Public Date</label>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <h5 class="text-center">If a Field Officer</h5>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Opening Cash in Hand</label>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- resi_and_other ends --}}

                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="mr-auto">
                                <input type="button" class="btn btn-previous btn-fill btn-default btn-wd disabled"
                                    name="previous" value="Previous">
                            </div>
                            <div class="ml-auto">
                                <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next"
                                    value="Next">
                                <input type="button" class="btn btn-finish btn-fill btn-rose btn-wd" name="finish"
                                    value="Finish" style="display: none;">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- wizard container -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
      // Initialise the wizard
      demo.initMaterialWizard();
      setTimeout(function() {
        $('.card.card-wizard').addClass('active');
      }, 600);
    });
</script>
@endsection

@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-10 col-12 mr-auto ml-auto">
            <div class="card">
                <div class="card-body">
                    <form id="private_1" action="/member/add/private" method="POST">
                        @csrf
                        <div class="tab-pane active" id="private_1">
                            {{-- <h5 class="info-text"> Let's start with the basic information (with validation)</h5> --}}
                            <div class="row justify-content-center">

                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="form-group">
                                            <label for="">Code</label>
                                            <input class="form-control" name="customer_id" type="text" readonly value={{$cus_id}}>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row">

                                            <div class="col">
                                                <div class="form-group">
                                                <label for="c">STATUS</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                <select name="customer_status_id" id="c" class="form-control">
                                                    <option value="1">ACTIVE</option>
                                                    <option value="0">INACTIVE</option>
                                                </select>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Ttile</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <?php $titles=\App\Models\CutomerTitle::all()?>
                                        <select name="customer_title_id" id="" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($titles as $title)
                                              <option value="{{$title->id}}">{{$title->customer_title}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Name in Use</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input name="name_in_use" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Fullname</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="full_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Surname</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="surname" class="form-control">
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
                                <label class="col-sm-2 col-form-label">Branch</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="branch_id" id="" class="form-control">
                                            <option value="">Select Branch</option>
                                            @isset($branches)
                                            @foreach ($branches as $branche)
                                            <option value="{{$branche->id}}">{{$branche->branch_name}}</option>
                                            @endforeach
                                            @endisset

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label label-checkbox">Type(s)</label>
                                <div class="col-sm-10 checkbox-radios">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value=""> Non
                                            Member
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
                                            <input class="form-check-input" type="checkbox" value="">
                                            Guarantor
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            Supplier
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            Customer
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
                                            <input class="form-check-input" type="checkbox" value="">
                                            Introducer
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Account Category</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <select name="account_category_id" id="" class="form-control">
                                            @isset($accountcategories)
                                            @foreach ($accountcategories as $accountcategory)
                                            <option value="{{$accountcategory->id}}">
                                                        {{$accountcategory->account_category}}
                                            @endforeach
                                            @endisset

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Small Gr./ Acc.Off</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <select name="small_group_id" id="" class="form-control">
                                            <option value="">Select</option>
                                            @isset($smallgroups)
                                            @foreach ($smallgroups as $smallgroup)
                                            <option value="{{$smallgroup->id}}">
                                                        {{$smallgroup->small_group}}
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Acc. Office Sub No.</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <select name="sub_account_office_id" id="" class="form-control">
                                            <option value="">Select</option>
                                            @isset($subaccountoffices)
                                            @foreach ($subaccountoffices as $subaccountoffice)
                                            <option value="{{$subaccountoffice->id}}">
                                                        {{$subaccountoffice->sub_account_office}}
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Sub Account Office</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">ID Type</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <select name="identification_type_id" id="id_type" class="form-control">
                                                    <option value="">Select</option>
                                                    @isset($idtypes)
                                                    @foreach ($idtypes as $idtype)
                                                    <option value="{{$idtype->id}}">
                                                                {{$idtype->identification_type}}
                                                    @endforeach
                                                    @endisset                                                </select>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" name="identification_number" class="form-control">
                                            </div>
                                        </div>
                                        {{-- <div class="col">
                                            <div class="form-group">
                                                <a onclick="submit_id(id_type.value, )"  class="btn btn-sm btn-primary">Add</a>
                                            </div>
                                        </div> --}}
                                    </div>


                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Address </label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="address_data" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Telephone No</label>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                            <select name="" id="" class="form-control">
                                                <option value="">Select Type</option>
                                                @isset($contacttypes)
                                                @foreach ($contacttypes as $contacttype)
                                                <option value="{{$contacttype->id}}">
                                                            {{$contacttype->contact_type}}
                                                @endforeach
                                                @endisset                                            </select>
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
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Fax</label>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">

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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </form>
                    {{-- Ends Private 1 --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

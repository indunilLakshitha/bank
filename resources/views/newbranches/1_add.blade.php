@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-10 col-12 mr-auto ml-auto">
            <div class="card " style="border: solid">
                <div class="row">
                    <div class="col-3">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Branch Member Creation</h4>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-8">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text"> --}}
                    {{-- <h4 class="card-title">Member Creation</h4> --}}
                    {{-- <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a> --}}
                    {{-- </div>
                        </div>
                    </div> --}}
                </div>


                <div class="card-body">
                    <form id="form" action="{{url('/branchesadd')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="tab-pane active" id="private_1">
                            {{-- <h5 class="info-text"> Let's start with the basic information (with validation)</h5> --}}



                            <div class="row">
                                <label class="col-sm-2 col-form-label">Branch Name  <font color="red">*</font></label>
                                <div class="col-lg-6 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input name="name_in_use" type="text" class="form-control" oninput="full_name.value=this.value"required>
                                        <input name="full_name" type="hidden" id="full_name"  class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <label class="col-sm-2 col-form-label">Full Name<font color="red">*</font></label>
                                <div class="col-lg-6 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="full_name" class="form-control" required>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Address<font color="red">*</font></label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="address_line_1" class="form-control" required>
                                        <input type="text" name="address_line_2" class="form-control">
                                        <input type="text" name="address_line_3" class="form-control">
                                        <input type="text" name="address_line_4" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Branch<font color="red">*</font></label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select name="branch_id" id="" class="form-control"
                                            data-style="select-with-transition" required>
                                            <option value="0">Select Branch</option>
                                            @isset($branches)
                                            @foreach ($branches as $branch)
                                            <option value="{{$branch->id}}">
                                                {{$branch->branch_code.' - '.$branch->branch_name}}</option>
                                            @endforeach
                                            @endisset

                                        </select>
                                    </div>
                                </div>
                            </div>






                            <div class="row">
                                <label class="col-sm-2 col-form-label">Telephone No</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                            <select name="contact_type_id" id="contact_type_id" class="form-control"
                                                data-style="select-with-transition">
                                                <option value="">Select Type</option>
                                                @isset($contacttypes)
                                                @foreach ($contacttypes as $contact_type)
                                                <option value="{{$contact_type->id}}">
                                                    {{$contact_type->contact_type}}
                                                </option>
                                                @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                            <input type="number" name="contact_data" class="form-control"
                                                placeholder="011 2345 678" maxlength="10">
                                            <input type="hidden" name="account_category_id" class="form-control"
                                                placeholder="" value="1">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Fax</label>
                                <div class="col-lg-5 col-md-3 col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <input type="text" name="fax_number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-lg-5 col-md-3 col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <input type="email" name="email_address" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button  type="submit" class="btn btn-primary">SUBMIT</button>
                    </form>
                    {{-- Ends Private 1 --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // function validate_form(){

    //         if(!sign_img.files[0]) {
    //             // console.log(img_1.files[0]);
    //             return Swal.fire('Please upload Signature Image')
    //         }
    //         return form.submit()
    //     }


</script>

@endsection

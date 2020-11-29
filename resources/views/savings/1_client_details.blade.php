@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="row">
                    <div class="col-3">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Step 01 - Savings Account Opening</h4>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-8"> --}}
                    {{-- <div class="card-header card-header-rose card-header-text"> --}}
                    {{-- <div class="card-text"> --}}
                    {{-- <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a> --}}
                    {{-- </div> --}}
                    {{-- </div> --}}
                    {{-- </div> --}}
                </div>
            </div>
            <form method="post" action="/saving/open" class="form-horizontal" enctype="multipart/form-data">
                <div class="card " style="border: solid">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Client Details</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            {{-- <div class="row">
                            <label class="col-sm-2 col-form-label">CIF</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" value={{$CIF}} disabled>
                        </div>
                    </div>
                </div> --}}
                <div style="border: solid">
                    <div class="row">
                        <label class="col-sm-2 col-form-label"> Client Full Name</label>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input oninput="toCap(this.value, this.id), get_options(this.value, this)"
                                            type="text" class="form-control js-example-data-ajax" id="client_full_name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <a class="btn btn-primary text-white" data-toggle="modal"
                                            href="#noticeModal">SEARCH</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </div>
    </div>

    <input type="hidden" id="branch_id" name="branch_id">
    <input type="hidden" id="customer_id" name="customer_id">
    <input type="hidden" id="account_number" name="account_number" value={{$acc_count}}>
    <div class="row">
        <label class="col-sm-2 col-form-label">Full Name</label>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <input type="text" name="full_name" class="form-control" id="full_name">
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- <div class="row">
                            <label class="col-sm-2 col-form-label">CIF</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div> -->

        <div class="row">
            <label class="col-sm-2 col-form-label">DOB</label>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="date" id="dob" name="dob" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Customer FATCA Clearance Received</label>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <select name="FATCA_clearance_received" class="form-control"
                                data-style="select-with-transition">
                                <option value="">Select </option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Customer PEP Clearance Received</label>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <select name="PEP_clearance_received" class="form-control"
                                data-style="select-with-transition">
                                <option value="">Select </option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br> <br>

    <div class="row">
        <label class="col-sm-2 col-form-label">Branch Code</label>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="branch_code" name="branch_code">
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <label class="col-sm-2 col-form-label">Customer Rating</label>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="" name="">
            </div>
        </div>
    </div> --}}

    <div class="row">
        <label class="col-sm-2 col-form-label">Customer Signature</label>
        <div class="col-sm-10">
            <div class="form-group">
                <span class="btn btn-round btn-rose btn-file ">
                    <span class="fileinput-new">Choose File</span>
                    <input type="file" name="cus_sign_img" />
                </span>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="card " style="border: solid">

    <div class="card ">
        <div class="card-body ">
            <div class="card-header card-header-rose card-header-text">

                <div class="card-text">
                    <h4 class="card-title">General Information</h4>
                </div>
            </div>
            {{-- <div class="row">
                <label class="col-sm-2 col-form-label">Lead source Category</label>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                @php
                                $lead_src_cts = Illuminate\Support\Facades\DB::table('lead_sources')->get();
                                @endphp
                                <select name="lead_source_category_id" class="form-control">
                                    <option value="">Select </option>
                                    @isset($lead_src_cts)
                                    @foreach ($lead_src_cts as $ls)
                                    <option value="{{$ls->id}}">
                                        {{$ls->lead_source_category}}
                                        @endforeach
                                        @endisset
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Lead source Identification</label>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <input type="text" class="form-control" name="lead_source_identification">

                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="row">
                <label class="col-sm-2 col-form-label">Account Description</label>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <input type="text" class="form-control" name="account_description">

                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="row">
            <label class="col-sm-2 col-form-label">Account Category</label>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            @php
                            $acc_cats = Illuminate\Support\Facades\DB::table('account_categories')->get();
                            @endphp
                            <select name="account_category_id" class="form-control" data-style="select-with-transition">
                                <option value="">Select </option>
                                @isset($acc_cats)
                                @foreach ($acc_cats as $ac_cat)
                                <option value="{{$ac_cat->id}}">
            {{$ac_cat->account_category}}
            @endforeach
            @endisset
            </select>
        </div>
    </div>
</div>
</div>
</div> --}}
{{-- <div class="row"> --}}
    {{-- <label class="col-sm-2 col-form-label">Account Type</label>
    <div class="col-sm-8">
        <div class="row">
            <div class="col-5">
                <div class="form-group"> --}}
                    {{-- @php
                    $acc_types = Illuminate\Support\Facades\DB::table('account_types')->get();
                    @endphp --}}
                    {{-- <select name="account_type_id" class="selectpicker" data-style="select-with-transition">
                        <option value="">Select </option>
                        @isset($acc_types)
                        @foreach ($acc_types as $ac_type)
                        <option value="{{$ac_type->id}}">
                            {{$ac_type->account_type}}
                            @endforeach
                            @endisset
                    </select>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="row">
    <label class="col-sm-2 col-form-label label-checkbox">Services</label>
    <div class="row">
        <div class="col-sm-5 checkbox-radios ml-3">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" checked type="checkbox" name="has_atm" value="1">
                    ATM
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                </label>
            </div>
        </div>
        <div class="col-sm-5 checkbox-radios ml-3">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" checked type="checkbox" name="has_sms" value="1"> SMS
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                </label>
            </div>
        </div>
        <div class="col-sm-5 checkbox-radios ml-3">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="has_internet_banking" value="1">
                    Internet Banking
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                </label>
            </div>
        </div>
        <div class="col-sm-5 checkbox-radios ml-3">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="has_mobile_banking" value="1">
                    Mobile Banking
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                </label>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <label class="col-sm-2 col-form-label label-checkbox">Account Maintenance Via</label>
    <div class="row">
        <div class="col-sm-7 checkbox-radios ml-3">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" checked type="checkbox" name="has_passbook" value="1">Passbook
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                </label>
            </div>
        </div>
        <div class="col-sm-3 checkbox-radios " style="margin-left: 44px">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="has_account_statement" value="1">
                    Account Statement
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                </label>
            </div>
        </div>

    </div>
</div>
{{-- <div class="row">
    <label class="col-sm-2 col-form-label">Options</label>
    <div class="col-sm-8">
        <div class="col-10">
            <div class="form-group">
                <div class="col"><input type="checkbox" class="form-control" name="has_atm" value="1"> ATM
                </div>
                <div class="col"><input type="checkbox" class="form-control" name="has_sms" value="1"> SMS
                </div>
                <div class="col"><input type="checkbox" class="form-control" name="has_internet_banking" value="1">
                    Internet Banking</div>
                <div class="col"><input type="checkbox" class="form-control" </div>
            </div>
        </div>
    </div>
</div> --}}
{{--
<div class="row">
    <label class="col-sm-2 col-form-label">Account Maintenance Via</label>
    <div class="col-sm-8">
        <div class="col-10">
            <div class="form-group">
                <div class="col"><input type="checkbox" class="form-control" name="has_account_statement" value="1">
                    Account Statement</div>
                <div class="col"><input type="checkbox" class="form-control" name="has_passbook" value="1">Passbook
                </div>
            </div>
        </div>
    </div>
</div> --}}
</div>
</div>
</div>
<div class="row">
    <div class="col">
        <button class="btn btn-primary float-right" type="submit">NEXT</button>
    </div>
</div>
</form>
</div>
</div>
</div>
{{-- wild card model------------------------------------------------------------------ --}}
@include('layouts.search_modal')

<script>
    //     $("#client_full_name").select2({
//   ajax: {
//     url: '{{('/search_by_full_name')}}',
//     dataType: 'json',
//     delay: 250,
//     // data: data
//     data: function (params) {
//       return {
//         q: params.term, // search term
//         page: params.page
//       };
//     },
//     processResults : function(data, params){
//         // return console.log(this.$element[0].id);
//         return set_options(this.$element[0].id, data)

//         // $(`#${this.$element[0].id}`).select2({
//         //     data: data
//         // })

//     }
//     // processResults: function (data, params) {
//     //   // parse the results into the format expected by Select2
//     //   // since we are using custom formatting functions we do not need to
//     //   // alter the remote JSON data, except to indicate that infinite
//     //   // scrolling can be used
//     //   console.log(data);
//     // //   params.page = params.page || 1;

//     // //   return {
//     // //     results: data.items,
//     // //     pagination: {
//     // //       more: (params.page * 30) < data.total_count
//     // //     }
//     // //   };
//     // return {data: data}
//     // },
//     // cache: true
//   },
//   placeholder: 'Search by Name',
//   minimumInputLength: 1,
// //   templateResult: formatRepo,
// // templateResult : set_options
// //   templateSelection: formatRepoSelection
// });

function formatRepo (repo) {
    console.log(repo);
  if (repo.loading) {
    return repo.text;
  }

//   var $container = $(
//     "<div class='select2-result-repository clearfix'>" +
//     //   "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
//       "<div class='select2-result-repository__meta'>" +
//         "<div class='select2-result-repository__title'></div>" +
//         "<div class='select2-result-repository__description'></div>" +
//         "<div class='select2-result-repository__statistics'>" +
//           "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> </div>" +
//           "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> </div>" +
//           "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> </div>" +
//         "</div>" +
//       "</div>" +
//     "</div>"
//   );

//   $container.find(".select2-result-repository__title").text(repo.full_name);
//   $container.find(".select2-result-repository__description").text(repo.description);
//   $container.find(".select2-result-repository__forks").append(repo.forks_count + " Forks");
//   $container.find(".select2-result-repository__stargazers").append(repo.stargazers_count + " Stars");
//   $container.find(".select2-result-repository__watchers").append(repo.watchers_count + " Watchers");

  return $container;
// console.log($container);
}

// function formatRepoSelection (repo) {
//     console.log(repo , '2');
//   return repo.full_name || repo.text;
// }

// function set_options(id, data){
//     // console.log(document.querySelector(`#${id}`));
//     // let selection = document.querySelector(`#${id}`)
//     let selection = document.querySelector(`#select2-client_full_name-results`)
//     selection.innerHTML = ''
//       console.log(selection);
//     // return console.log(data, 'data');
//     data.forEach(i => {
//         html = `
//         <li> ${i.full_name}</li>
//         `
//         selection.innerHTML += html
//         console.log(selection);
//     })
//     //   selection.classList.remove('select2-hidden-accessible')
//      return console.log(selection);
// }

function get_options(text, element){
    $.ajax({
        type: 'GET',
        url: '{{('/search_by_full_name')}}',
        data: {text},
        success: function(data){
            console.log(data)
            return set_options(data)
            // btn.classList.add('d-none')
        },
        error: function(data){
            console.log(data)
        }

    })
}

function set_options(data){
    client_full_name_select.classList.remove('d-none')
    client_full_name_select.innerHTML = '<option value="">Select </option>'
    data.forEach(i => {
        html = `
        <option value="${i.full_name}" > ${i.full_name}</option>
        `
        client_full_name_select.innerHTML += html

    })
}

function set_full_name(name, el){
    // console.log(name);
    client_full_name.value = name
    client_full_name_select.classList.add('d-none')
}
</script>


@endsection

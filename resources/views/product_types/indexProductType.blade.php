@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Product Type</h4>
            </div>
        </div>
        <div class="card-body ">
            <form method="POST" class="form-horizontal" action="{{ route('productType.store') }}"  id="PTform" >
                @csrf

                <div class="row">
                    <label class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="product_type" name="product_type" oninput="code(this.value)">
                            <span class="bmd-help">Product Type</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="product_code" name="product_code">
                            <span class="bmd-help">Product Code</span>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <label class="col-sm-2 col-form-label">Authorized Level</label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="req_authorized_level" name="req_authorized_level">
                            <span class="bmd-help">Level</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Maximum Interest</label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="number" class="form-control" id="max_interest" name="max_interest">
                            <span class="bmd-help">Interest</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Default Interest</label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="number" class="form-control" id="default_interest" name="default_interest">
                            <span class="bmd-help">Interest</span>
                        </div>
                    </div>
                </div><div class="row">
                    <label class="col-sm-2 col-form-label">Minimum Balance</label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="number" class="form-control" id="minimum_balance" name="minimum_balance">
                            <span class="bmd-help">Balance</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label label-checkbox">Requirements</label>
                    <div class="row">
                        <div class="col-sm-5 checkbox-radios ml-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="is_beneficiearies_required" value="1">
                            Beneficiearies
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-sm-5 checkbox-radios ml-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="is_nominies_required" value="1">
                            Nominies
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-sm-5 checkbox-radios ml-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input"  type="checkbox" name="is_guardianes_required" value="1">
                            Guardianes
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-sm-5 checkbox-radios ml-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input"  type="checkbox" name="is_documents_required" value="1">
                            Documents
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </div>


                    </div>
                </div>

                <div class="card-footer ">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-fill btn-rose">ADD</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th>ID </th>
                                    <th>PRODUCT TYPE</th>
                                    <th>PRODUCT CODE</th>
                                    <th>MAXIMUM INTEREST</th>
                                    <th>DEFAULT INTEREST</th>
                                    <th>MINIMUM BALANCE</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </thead>
                                <tbody id="results_tbody">

                                   @isset($prd_typs)
                                   @foreach ($prd_typs as $prd_typ)
                                       <tr>
                                            <th>{{$prd_typ->id}}</th>
                                            <th>{{$prd_typ->product_type}} </th>
                                            <th>{{$prd_typ->product_code}} </th>
                                            <th>{{$prd_typ->max_interest}} </th>
                                            <th>{{$prd_typ->default_interest}}</th>
                                            <th>{{$prd_typ->minimum_balance}} </th>
                                           @if(intval($prd_typ->is_enable) == 1)
                                                <th>ACTIVE</th>
                                           @else
                                               <th>INACTIVE</th>
                                           @endif
                                            <th><a href="{{ route('productType.show', $prd_typ->id) }}" rel="tooltip" class="btn-sm btn-view btn-round" ><i class="material-icons">list</a>
                                                <a href="{{route('productType.edit', $prd_typ->id)}}" rel="tooltip" class="btn-sm btn-change btn-round" ><i class="material-icons">edit</i></a>
                                                <a href="{{route('productType.destroy', $prd_typ->id)}}" rel="tooltip" class="btn-sm btn-delete btn-round" ><i class="material-icons">delete</i></a>
                                            </th>
                                       </tr>
                                   @endforeach

                                   @endisset


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function code(product){
var c=product.substring(0, 2)
var code=c.toUpperCase()
// console.log(code)
product_code.value=code
    }
</script>

@endsection

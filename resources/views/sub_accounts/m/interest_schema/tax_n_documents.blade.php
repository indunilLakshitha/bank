@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body ">
                    <form id="form" class="form-horizontal" action="/tax_n_docs" method="post">
                        @csrf

                        <input type="hidden" name="sub_account_id" value="{{$id}}">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Tax</h4>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Debit Tax Apply</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="checkbox" class="form-control" name="is_debit_appliable" id="" value="1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Debit Tax Apply Rate</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" name="debit_tax_rate" value="1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">WHT Deducation</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="checkbox" class="form-control" name="is_wht_deduction" id="" value="1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <button class="btn btn-primary">SUMBIT</button> </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

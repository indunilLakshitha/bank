@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body ">
                    <form id="form" class="form-horizontal" action="/transaction_scheme_params" method="post">
                        @csrf
                    <input type="hidden" name="sub_account_id" value="{{$sub_acc_id}}">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Transaction Scheme Parameters</h4>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Minimum Balance to Active the Acount</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" name="minimum_balance_activate">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Initial Deposit Allow Mode</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">

                                            <select name="deposite_mode_id" id="" class="form-control"
                                                data-style="select-with-transition">
                                                <option value="">Select</option>

                                                <option value="">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Minimum Acount Balance</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" name="maximum_balance">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Minimum Withdrawal Amount per Month</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" name="month_max_withdrawal_count">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Minimum Withdrawal Amount</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" name="minimum_withdrawal_amount">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Minimum Withdrawal Amount per Day</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" name="maximum_withdrawal_limit_day">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Display Acount Balance</label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="checkbox" class="form-control" name="is_dislpay_account_balance" id="" value="1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Allow Fund Transfer</label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="checkbox" class="form-control" name="is_allow_fund_trasfer" id="" value="1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <label class="col-sm-4 col-form-label">Allow Fund Transfer</label> --}}
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button class="btn btn-primary">SUBMIT</button> </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

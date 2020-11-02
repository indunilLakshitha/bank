@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-10 col-12 mr-auto ml-auto">
            <div class="card">
                <div class="card-body">
                    <form id="private_1" action="/member/add/status" method="POST">
                        @csrf
                        <div class="tab-pane active" id="status">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Birth Date / Nic Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="date" name="date_of_birth" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Religion</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="religion_data_id" id="" class="form-control">
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
                                        <select name="married_status_id" id="" class="form-control">
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
                                        <input type="date" name="member_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Joined Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="date" name="join_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Expired Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="date" name="expire_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Exit Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="date" name="exit_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Death Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="date" name="death_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Neglection Starting Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="date" name="neglection_starting_date" class="form-control">
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

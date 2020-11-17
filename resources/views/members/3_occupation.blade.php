@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-10 col-12 mr-auto ml-auto">
            <div class="card">
                <div class="card-body col-6">
                    <form id="private_1" action="/member/add/occupation" method="POST">
                        @csrf
                        <input type="hidden" name="customer_id" value={{$cus_id}}>
                        <div class="tab-pane active" id="status">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Employee at Society</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="is_employee" id="" class="form-control">
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
                                        <input type="text" name="designation" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="address_line_1" class="form-control">
                                        <input type="text" name="address_line_2" class="form-control">
                                        <input type="text" name="address_line_3" class="form-control">
                                        <input type="text" name="address_line_4" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">EPF No</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="epf_no">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">NEXT</button>
                    </form>
                    {{-- Ends Private 1 --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

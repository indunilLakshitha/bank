@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-10 col-12 mr-auto ml-auto">
            <div class="card">
                <div class="card-body">
                    <form id="private_1" action="/member/add/othersociety" method="POST">
                        @csrf
                        <input type="hidden" name="customer_id" value={{$cus_id}}>
                        <div class="tab-pane active" id="status">
                            <div class="tab-pane" id="other_societies">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Other Memberships</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <textarea name="other_memberships" id="" cols="70" rows="8"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Curr. Designation</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="current_designation">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Previous Designation</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <textarea name="previous_designation" id="" cols="70" rows="8"></textarea>
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

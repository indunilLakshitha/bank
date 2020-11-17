@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-10 col-12 mr-auto ml-auto">
            <div class="card">
                <div class="card-body">
                    <form id="private_1" action="/member/add/status" method="POST">
                        @csrf
                        <input type="hidden" name="customer_id" value={{$cus_id}}>
                        <div class="tab-pane active" id="status">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Birth Date / Nic Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="date" name="date_of_birth" class="form-control col-3">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Religion</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        @php
                                            $rels = Illuminate\Support\Facades\DB::table('relegion_data')->get();
                                        @endphp
                                        <select name="religion_data_id" id=""  class="selectpicker" id="married_status_id" data-style="select-with-transition">
                                            <option value="">Select</option>
                                            @foreach ($rels as $item)
                                                <option value="{{$item->id}}">{{$item->religion_data}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Married Status</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        @php
                                        $rels = Illuminate\Support\Facades\DB::table('married_statuses')->get();
                                    @endphp
                                    <select name="married_status_id" id=""  class="selectpicker" id="married_status_id" data-style="select-with-transition">
                                        <option value="">Select</option>
                                        @foreach ($rels as $item)
                                            <option value="{{$item->id}}">{{$item->married_status}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        @php
                                        $rels = Illuminate\Support\Facades\DB::table('genders')->get();
                                    @endphp
                                    <select name="gender_id" id=""  class="selectpicker" id="married_status_id" data-style="select-with-transition">
                                        <option value="">Select</option>
                                        @foreach ($rels as $item)
                                            <option value="{{$item->id}}">{{$item->gender}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Date Became Member</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="date" name="member_date" class="form-control col-3">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Joined Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="date" name="join_date" class="form-control col-3">
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

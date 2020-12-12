@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="row">
                    <div class="col-10">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Paalmtop Transfer</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="card-text">
                            <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 " style="margin-left: 260px">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table">
                                    <table id="table" class="table table-striped table-no-bordered table-hover"
                                        cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <th>ID </th>
                                            <th>DATE</th>
                                            <th>Customer Name</th>
                                            <th>Customer ID</th>
                                            <th>Account ID</th>
                                            <th>Amount</th>
                                            <th>Select</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody id="results_tbody">


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </form>
</div>

<script>


</script>


@endsection

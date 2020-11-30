@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
                {{-- <div class="card-icon">
            <i class="material-icons"></i>
          </div> --}}
                <h4 class="card-title">
                    <div class="row">
                        <div class="col">
                            <a  rel="tooltip" class="btn btn-sm btn-primary btn-round pull-left">
                                <i class="material-icons">add</i> <span class="mx-1">ගෙවීම්</span>
                            </a>
                        </div>
                        <div class="col">
                            <a  rel="tooltip" class="btn btn-sm btn-primary btn-round pull-right">
                                <i class="material-icons">add</i> <span class="mx-1">ගෙවීම්</span>
                            </a>
                        </div>
                    </div>

                </h4>
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="">
                                    <table id="" class="table table-striped table-no-bordered table-hover"
                                        cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <th>සංකේත අංකය </th>
                                            <th>ගිණුම් අංකය</th>
                                            <th>වේලාව</th>
                                            <th>විස්තරය</th>
                                            <th>වටිනාකම</th>
                                        </thead>
                                        <tbody id="results_tbody">
                                            <?php $total_d=0?>
                                            @isset($details)
                                            @foreach ($details as $detail)
                                            @if($detail->transaction_type=="DEPOSITE")
                                            <tr>
                                                <th>{{$detail->id}}</th>
                                                <th>{{$detail->account_number}} </th>
                                                <th>
                                                    <?php
                                                $d=strtotime($detail->created_at);
                                                echo  date("h:i:sa", $d);
                                            ?></th>
                                                <th></th>
                                                <?php $total_d+=$detail->transaction_amount ?>
                                                <th><?php echo number_format( $detail->transaction_amount , 2 , '.' , ',' ) ?>
                                                </th>

                                            </tr>
                                            @endif
                                            @endforeach
                                            @endisset
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>එකතුව</td>
                                                <td></td>
                                            <th><?php echo number_format( $total_d , 2 , '.' , ',' ) ?></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="">
                                    <table id="" class="table table-striped table-no-bordered table-hover"
                                        cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <th>සංකේත අංකය </th>
                                            <th>ගිණුම් අංකය</th>
                                            <th>වේලාව</th>
                                            <th>විස්තරය</th>
                                            <th>වටිනාකම</th>
                                        </thead>
                                        <tbody id="results_tbody">
                                            <?php $total_w=0?>
                                            @isset($details)
                                            @foreach ($details as $detail)
                                            @if($detail->transaction_type=="WITHDRAW")

                                            <tr>
                                                <?php $total_w+=$detail->transaction_amount ?>
                                                <th>{{$detail->id}}</th>
                                                <th>{{$detail->account_number}} </th>
                                                <th>
                                                    <?php
                                                $d=strtotime($detail->created_at);
                                                echo  date("h:i:sa", $d);
                                            ?></th>
                                                <th></th>
                                                <th><?php echo number_format( $detail->transaction_amount , 2 , '.' , ',' ) ?>
                                                </th>

                                            </tr>
                                            @endif
                                            @endforeach
                                            @endisset
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>එකතුව</td>
                                                <td></td>
                                            <th><?php echo number_format( $total_w , 2 , '.' , ',' ) ?></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="">
                                    <table id="" class="table table-striped table-no-bordered table-hover"
                                        cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="">
                                    <table id="" class="table table-striped table-no-bordered table-hover"
                                        cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
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
</div>

<script>


</script>

@endsection

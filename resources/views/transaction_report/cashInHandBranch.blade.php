@extends('layouts.app')


@section('content')
<style>
.zoom {
  padding: 50px;
  background-color: green;
  transition: transform .2s; /* Animation */
  width: 200px;
  height: 200px;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.5); /* (150% zoom)*/
}

body{margin-top:20px;
background:#eee;
}

/*Invoice*/
.invoice .top-left {
    font-size:65px;
	color:#ffff00;
}

.invoice .top-right {
	text-align:right;
	padding-right:20px;
}

.invoice .table-row {
	margin-left:-20px;
	margin-right:-20px;
	margin-top:25px;
}

.invoice .payment-info {
	font-weight:500;
}

.invoice .table-row .table>thead {
	border-top:10px solid #ddd;
}

.invoice .table-row .table>thead>tr>th {
	border-bottom:10px solid #ddd;
}

.invoice .table>tbody>tr>td {
	padding:18px 20px;
}

.invoice .invoice-total {
	margin-right:-10px;
	font-size:16px;
}

.invoice .last {

   border-collapse:separate;
   border-spacing:0 15px;
}

.invoice-ribbon {
	width:100px;
	height:100px;
	overflow:hidden;
	position:absolute;
	top:-1px;
    right:100px;
    text-align: right;
}



.ribbon-inner:before,.ribbon-inner:after {
	content:"";
	position:absolute;
}

.ribbon-inner:before {
	left:0;
}

.ribbon-inner:after {
	right:0;
}

@media(max-width:575px) {
	.invoice .top-left,.invoice .top-right,.invoice .payment-details {
		text-align:center;
	}

	.invoice .from,.invoice .to,.invoice .payment-details {
		float:none;
		width:100%;
		text-align:center;
		margin-bottom:25px;
	}

	.invoice p.lead,.invoice .from p.lead,.invoice .to p.lead,.invoice .payment-details p.lead {
		font-size:22px;
	}

	.invoice .btn {
		margin-top:10px;
	}
}
.invoice .hr{
    height:20px
}
@media print {
	.invoice {
		width:900px;
		height:800px;
	}
}


</style>
<div class="row">
    <div class="col-md-12">
        <div class="card ">


<div class="container bootstrap snippets bootdeys">

<div class="row">
  <div class="col-sm-12">
	  	<div class="panel panel-default invoice" id="invoice">
		  <div class="panel-body">
            <div class="col-5">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">CASH/CHEQUES INHAND</h4>
                            </div>
                        </div>
                    </div>

            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <label >FROM:</label>
                            <div class="pull-right col-2">
                                <input type="date" class="form-control datepicke" id="dateFrom">
                            </div>
                            <label for="">TO:</label>
                            <div class="pull-right col-2" value="">
                                <input type="date" class="form-control datepicke" id="dateTo">
                            </div>
                            <label for="">USER:</label>
                            <div class="pull-right col-2">
                                <select name="select_branch1" class="form-control" id="user">
                                    <option value="" >--Select--</option>
                                </select>
                            </div>
                            <label for="">BRANCH:</label>
                            <div class="col-1">
                                <input class="form-check" type="checkbox" value="1" id="branch">
                                <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                            </div>
                        <div class=" col-1 ">
                            <button type="button"  onclick="search(this)" class="btn btn-info" id="search">Search</button>
                        </div>
                    </div>
                </div>
            </div>

			<div class="row table-row">
				<table class="table table-striped">
			      <thead>
			        <tr>
			          <th class="text-center" style="width:30%">USER</th>
			          <th class="text-center" style="width:15%">CASH</th>
                      <th class="text-center" style="width:15%">CHEQUES</th>
                      <th class="text-center" style="width:15%">PETTY CASH</th>
			          <th class="text-center" style="width:15%">TOTAL</th>
			        </tr>
			      </thead>
			      <tbody>
			        <tr>
			          <td class="table-info">OPEN IN HAND</td>
			          <td class="table-info text-center" >0.00</td>
                      <td class="table-info text-center" >0.00</td>
                      <td class="table-info text-center" >0.00</td>
                      <td class="table-info text-center" >0.00</td>

                    </tr>
                    <tr>
			          <td></td>
			          <td></td>
                      <td></td>
                      <td></td>
			          <td></td>
                    </tr>
                    <tr>
			          <td>INT. TRANSFER OUT</td>
			          <td class="text-center">0.00</td>
                      <td class="text-center">0.00</td>
                      <td class="text-center">0.00</td>
			          <td class="text-center">0.00</td>
                    </tr>
                    <tr>
			          <td></td>
			          <td></td>
                      <td></td>
                      <td></td>
			          <td></td>
                    </tr>
                    <tr>
			          <td>RECIPT</td>
			          <td class="text-center">0.00</td>
                      <td class="text-center">0.00</td>
                      <td class="text-center">0.00</td>
			          <td class="text-center">0.00</td>
                    </tr>
                    <tr>
			          <td>PAYMENT</td>
			          <td class="text-center">0.00</td>
                      <td class="text-center">0.00</td>
                      <td class="text-center">0.00</td>
			          <td class="text-center">0.00</td>
                    </tr>
                    <tr>
			          <td>CASH DEPOSIT</td>
			          <td class="text-center">0.00</td>
                      <td class="text-center">0.00</td>
                      <td class="text-center">0.00</td>
			          <td class="text-center">0.00</td>
                    </tr>
			        <tr>
			          <td>INT. TRANSFER IN</td>
			          <td class="text-center">0.00</td>
                      <td class="text-center">0.00</td>
                      <td class="text-center">0.00</td>
			          <td class="text-center">0.00</td>
                    </tr>
                    <tr>
			          <td >CASH WITHDROWEL</td>
			          <td class="text-center">0.00</td>
                      <td class="text-center">0.00</td>
                      <td class="text-center">0.00</td>
			          <td class="text-center">0.00</td>
                    </tr>
                    <tr>
			          <td ></td>
			          <td ></td>
                      <td ></td>
                      <td ></td>
			          <td ></td>
                    </tr>

                    <tr class="invoice-total" >
			          <td class="table-success">CLOSING IN HAND</td>
			          <td class="table-success text-center ">0.00</td>
                      <td class="table-success text-center ">0.00</td>
                      <td class="table-success text-center ">0.00</td>
			          <td class="table-success text-center ">0.00</td>
			        </tr>
			       </tbody>
			    </table>

			</div>


            <div class="col-xs-6 margintop text-right">
				<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>			</div>
		  </div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
<script>


function search(){
        const from = document.querySelector('#dateFrom');
        const to = document.querySelector('#dateTo');
        const user = document.querySelector('#user');
        console.log(from.value);
        console.log(dateTo.value);
        console.log(user.value);

        $.ajax({
            type: 'GET',
            url: '{{('/CasHiNhanDbrancH/branch')}}',
            data: {'from':from.value,'to':to.value,'user':user.value},
            processData: false,
            contentType: false,
            success: function(data){
                console.log(data)

            },
            error: function(data){
                console.log(data)
            }

        })
    }



</script>

@endsection

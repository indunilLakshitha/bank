@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Savings Account Opening</h4>
                    </div>
                </div>
            </div>

                <div class="card ">
                    <div class="card-body ">
                            <div class="card-header card-header-rose card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">Guardian Information</h4>
                                </div>
                            </div>
                            @isset($guardians)
                                <table class="table">
                                    <tr><td>Guardian ID</td></tr>
                                    @foreach ($guardians as $item)
                                        <tr>
                                        <th>{{$item->guardian_id}}</th>
                                        </tr>
                                    @endforeach
                                </table>
                            @endisset
                    </div>
                </div>
                <div class="col-6 text-right">
                    <form action="/documents" method="POST">
                        @csrf
                        <input type="hidden" name="product_data_id" value={{$prod_id}}>
                        <input type="hidden" name="account_id" value={{$account_id}}>
                        <input type="hidden" name="customer_id" value={{$customer_id}}>
                        <button type="submit" class="btn btn-primary">NEXT</button>
                    </form>
                </div>
        </div>
    </div>
</div>


@endsection

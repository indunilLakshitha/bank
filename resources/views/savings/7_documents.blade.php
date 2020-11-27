@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="row">
                    <div class="col-3">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Step 04 - Savings Account Opening</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        {{-- <div class="card-header card-header-rose card-header-text"> --}}
                        <div class="card-text">
                            <!-- <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a> -->
                        </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
            {{-- <form method="post" action="/save_documents" class="form-horizontal" enctype="multipart/form-data"> --}}
    <div class="card " style="border: solid">
            <div class="card ">
                <div class="card-body ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Documents</h4>
                        </div>
                    </div>
                    <div class="row col-12 ">
                        <div class="col-sm-12">
                            <label class="col-sm-2 col-form-label">Document Type</label>

                            <label class="col-sm-2 col-form-label">Mandatory</label>

                            <label class="col-sm-1 col-form-label">Availability</label>
                            <label class="col-sm-1 col-form-label"></label>

                            <label class="col-sm-1 col-form-label">Remark</label>

                            <label class="col-sm-3 col-form-label">Upload Document</label>

                        </div>

                    </div>
                    @foreach($docs as $d)
                    <form id="form_{{$d->id}}">
                        @csrf
                        <input type="hidden" name="product_data_id" value={{$prod_id}}>
                        <input type="hidden" name="account_id" value={{$account_id}}>
                        <input type="hidden" name="customer_id" value={{$customer_id}}>
                        <input type="hidden" name="document_id" value={{$d->id}}>
                        <div class="row ">
                            {{-- <input type="hidden" name="doc_ids[1]"> --}}
                            <label class="col-sm-2 col-form-label">{{$d->document_name}}</label>
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-1  checkbox">
                                <div class="form-check ">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" @if ($d->is_mandatory
                                        == 1) checked @endif ">
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-1  checkbox">
                                <div class="form-check ">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" checked>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-1">
                            </div>


                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="text" name="client_name" class="form-control">
                                </div>
                            </div>

                            {{-- <input type="hidden" name="ids['x'=>{{$d->id}} ]"> --}}


                            <span class="btn btn-round btn-rose btn-file ">
                                <span class="fileinput-new">Choose File</span>
                                <input type="file" name="img" />
                            </span>
                            <input type="button" onclick="upload('form_{{$d->id}}', this)" class="btn btn-sm btn-fill "
                                name="submit" value="Upload">
                    </form>
                </div>
                @endforeach

                <br>
                <form action="/tax_details" method="POST">
                    @csrf
                    <input type="hidden" name="product_data_id" value={{$prod_id}}>
                    <input type="hidden" name="account_id" value={{$account_id}}>
                    <input type="hidden" name="customer_id" value={{$customer_id}}>
                    <div class="row">
                            <div class="col">
                        <button type="submit" class="btn btn-primary float-right">NEXT</button>
                            </div>
                        </div>
                </form>
            </div>
    </div>
        </div>
    </div>
</div>
</div>

<script>
    function upload(id, btn){
        let form =  document.querySelector(`#${id}`)
        $.ajax({
            type: 'POST',
            url: '{{('/save_documents')}}',
            data: new FormData(form),
            contentType: false,
            processData: false,
            success: function(data){
                console.log(data)
                // return set_search_by_name_results(data)
                btn.classList.add('d-none')
            },
            error: function(data){
                console.log(data)
            }

        })
    }
</script>
@endsection

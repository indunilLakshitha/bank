@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header card-header-success card-header-icon">
          {{-- <div class="card-icon">
            <i class="material-icons"></i>
          </div> --}}
          <h4 class="card-title">Global Sales by Top Locations</h4>
        </div>
        <div class="card-body ">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive table-sales">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>
                        <div class="flag">
                          <img src="../assets/img/flags/US.png" </div>
                      </td>
                      <td>USA</td>
                      <td class="text-right">
                        2.920
                      </td>
                      <td class="text-right">
                        53.23%
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection

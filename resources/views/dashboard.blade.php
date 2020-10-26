@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header card-header-rose">
                <div id="roundedLineChart" class="ct-chart"></div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Rounded Line Chart</h4>
                <p class="card-category">Line Chart</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header card-header-warning">
                <div id="straightLinesChart" class="ct-chart"></div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Straight Lines Chart</h4>
                <p class="card-category">Line Chart with Points</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header card-header-info">
                <div id="simpleBarChart" class="ct-chart"></div>
              </div>
              <div class="card-body">
                <h4 class="card-title ">Simple Bar Chart</h4>
                <p class="card-category">Bar Chart</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-icon card-header-info">
                <div class="card-icon">
                  <i class="material-icons">timeline</i>
                </div>
                <h4 class="card-title">Coloured Line Chart
                  <small> - Rounded</small>
                </h4>
              </div>
              <div class="card-body">
                <div id="colouredRoundedLineChart" class="ct-chart"></div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-icon card-header-rose">
                <div class="card-icon">
                  <i class="material-icons">insert_chart</i>
                </div>
                <h4 class="card-title">Multiple Bars Chart
                  <small>- Bar Chart</small>
                </h4>
              </div>
              <div class="card-body">
                <div id="multipleBarsChart" class="ct-chart"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-icon card-header-info">
                <div class="card-icon">
                  <i class="material-icons">timeline</i>
                </div>
                <h4 class="card-title">Coloured Bars Chart
                  <small> - Rounded</small>
                </h4>
              </div>
              <div class="card-body">
                <div id="colouredBarsChart" class="ct-chart"></div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="card card-chart">
              <div class="card-header card-header-icon card-header-danger">
                <div class="card-icon">
                  <i class="material-icons">pie_chart</i>
                </div>
                <h4 class="card-title">Pie Chart</h4>
              </div>
              <div class="card-body">
                <div id="chartPreferences" class="ct-chart"></div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-md-12">
                    <h6 class="card-category">Legend</h6>
                  </div>
                  <div class="col-md-12">
                    <i class="fa fa-circle text-info"></i> Apple
                    <i class="fa fa-circle text-warning"></i> Samsung
                    <i class="fa fa-circle text-danger"></i> Windows Phone
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection

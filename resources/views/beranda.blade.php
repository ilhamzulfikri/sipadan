<!-- Menghubungkan dengan view template master -->
@extends('tema')


<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')

<div class="main-panel">
  <!-- BEGIN : Main Content-->
  <div class="main-content">
    <div class="content-wrapper">

      <div class="row">
        <div class="col-xl-2 col-lg-6 col-md-6 col-12">
          <div class="card gradient-blackberry">
            <div class="card-content">
              <div class="card-body pt-2 pb-0">
                <div class="media">
                  <div class="media-body white text-left">
                    <h3 class="font-large-1 mb-0">{{$totalPekerjaan}}</h3>
                    <span>Total<br>Pekerjaan</span>
                  </div>
                  <div class="media-right white text-right">
                    <i class="icon-pie-chart font-large-1"></i>
                  </div>
                </div>
              </div>
              <div class="height-30 WidgetlineChart WidgetlineChartshadow mb-2">
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-6 col-md-6 col-12">
          <div class="card gradient-ibiza-sunset">
            <div class="card-content">
              <div class="card-body pt-2 pb-0">
                <div class="media">
                  <div class="media-body white text-left">
                    <h3 class="font-large-1 mb-0">{{$pembuatanRKS}}</h3>
                    <span>Pembuatan<br>RKS</span>
                  </div>
                  <div class="media-right white text-right">
                    <i class="icon-bulb font-large-1"></i>
                  </div>
                </div>
              </div>
              <div class="height-30 WidgetlineChart WidgetlineChartshadow mb-2">
              </div>

            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-6 col-md-6 col-12">
          <div class="card gradient-sunset">
            <div class="card-content">
              <div class="card-body pt-2 pb-0">
                <div class="media">
                  <div class="media-body white text-left">
                    <h3 class="font-large-1 mb-0">{{$tahapLelang}}</h3>
                    <span>Tahap<br>Lelang</span>
                  </div>
                  <div class="media-right white text-right">
                    <i class="icon-wallet font-large-1"></i>
                  </div>
                </div>
              </div>
              <div class="height-30 WidgetlineChart WidgetlineChartshadow mb-2">
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-6 col-md-6 col-12">
          <div class="card gradient-green-tea">
            <div class="card-content">
              <div class="card-body pt-2 pb-0">
                <div class="media">
                  <div class="media-body white text-left">
                    <h3 class="font-large-1 mb-0">{{$pembuatanKontrak}}</h3>
                    <span>Pembuatan<br>Kontrak</span>
                  </div>
                  <div class="media-right white text-right">
                    <i class="icon-graph font-large-1"></i>
                  </div>
                </div>
              </div>
              <div class="height-30 WidgetlineChart WidgetlineChartshadow mb-2">
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-6 col-md-6 col-12">
          <div class="card gradient-flickr">
            <div class="card-content">
              <div class="card-body pt-2 pb-0">
                <div class="media">
                  <div class="media-body white text-left">
                    <h3 class="font-large-1 mb-0">{{$tahapPekerjaan}}</h3>
                    <span>Tahap<br>Pekerjaan</span>
                  </div>
                  <div class="media-right white text-right">
                    <i class="icon-wallet font-large-1"></i>
                  </div>
                </div>
              </div>
              <div class="height-30 WidgetlineChart WidgetlineChartshadow mb-2">
              </div>
            </div>
          </div>
        </div>
        <!--
        <div class="col-xl-2 col-lg-6 col-md-6 col-12">
          <div class="card gradient-sunset">
            <div class="card-content">
              <div class="card-body pt-2 pb-0">
                <div class="media">
                  <div class="media-body white text-left">
                    <h3 class="font-large-1 mb-0">0</h3>
                    <span>Tahap<br>Penagihan</span>
                  </div>
                  <div class="media-right white text-right">
                    <i class="icon-wallet font-large-1"></i>
                  </div>
                </div>
              </div>
              <div id="Widget-line-chart4" class="height-50 WidgetlineChart WidgetlineChartshadow mb-2">
              </div>
            </div>
          </div>
        </div>-->
        <div class="col-xl-2 col-lg-6 col-md-6 col-12">
          <div class="card gradient-indigo-purple">
            <div class="card-content">
              <div class="card-body pt-2 pb-0">
                <div class="media">
                  <div class="media-body white text-left">
                    <h3 class="font-large-1 mb-0">{{$pekerjaanSelesai}}</h3>
                    <span>Kontrak<br>Selesai</span>
                  </div>
                  <div class="media-right white text-right">
                    <i class="icon-wallet font-large-1"></i>
                  </div>
                </div>
              </div>
              <div class="height-30 WidgetlineChart WidgetlineChartshadow mb-2">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row match-height">
        <div class="col-xl-5 col-lg-12 col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">STATISTIK</h4>
            </div>
            <div class="card-content">
              <p class="font-medium-2 text-muted text-center pb-2">Kontrak 5 Bulan Terakhir</p>
              <div id="Stack-bar-chart" class="height-300 Stackbarchart mb-2">
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-12 col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">INFORMASI</h4>
            </div>
            <div class="card-content">
              <div class="col-xl-12">
                <div class="card bg-success">
                  <div class="card-content">
                    <div class="px-3 py-3">
                      <div class="media">
                        <div class="media-body white text-left">
                          <h3>{{$totalUser}}</h3>
                          <span>User Terdaftar</span>
                        </div>
                        <div class="media-right align-self-center">
                          <i class="icon-user white font-large-2 float-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-12">
                <div class="card bg-warning">
                  <div class="card-content">
                    <div class="px-3 py-3">
                      <div class="media">
                        <div class="media-body white text-left">
                          <h3>{{$totalVendor}}</h3>
                          <span>Vendor Terdaftar</span>
                        </div>
                        <div class="media-right align-self-center">
                          <i class="icon-rocket white font-large-2 float-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-12 col-lg-6 col-12">
                <div class="card bg-danger">
                  <div class="card-content">
                    <div class="px-3 py-3">
                      <div class="media">
                        <div class="media-body white text-left">
                          <h3>{{ number_format((float)$persenSelesai, 2, '.', '') }} %</h3>
                          <span>Kontrak Selesai</span>
                        </div>
                        <div class="media-right align-self-center">
                          <i class="icon-pie-chart white font-large-2 float-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-12 col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">KONTRAK PER BIDANG</h4>
              <p>Jumlah kontrak yang telah diproses di SIPADAN per masing - masing bidang.</p>
            </div>
            <div class="card-content">
              <div class="card-body">
                <ul class="list-group">
                  @foreach($totalPerBidang as $tpb)
                  <li class="list-group-item">
                    <span class="badge bg-danger float-right">{{$tpb->jlh}}</span> {{$tpb->bidang}}
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
<!--
<div class="row match-height">
  <div class="col-lg-4 col-md-12">
    <div class="card">
      <div class="card-header text-center pb-0">
        <span class="font-medium-2 primary">Steps</span>
        <h3 class="font-large-2 mt-1">3261</h3>
      </div>
      <div class="card-content">
        <div id="donut-chart1" class="height-250 donut1">
        </div>
        <div class="card-body text-center">
          <span class="font-large-1 d-block mb-1">5000</span>
          <span class="primary font-medium-1">Steps Today's Target</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-12">
    <div class="card">
      <div class="card-header text-center pb-0">
        <span class="font-medium-2 warning">Distance</span>
        <h3 class="font-large-2 mt-1">7.6
          <span class="font-medium-1 grey darken-1 text-bold-400">miles</span>
        </h3>
      </div>
      <div class="card-content">
        <div id="donut-chart2" class="height-250 donut2">
        </div>
        <div class="card-body text-center">
          <span class="font-large-1 d-block mb-1">10</span>
          <span class="warning font-medium-1">Miles Today's Target</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-12">
    <div class="card">
      <div class="card-header text-center pb-0">
        <span class="font-medium-2 danger">Calories</span>
        <h3 class="font-large-2 mt-1">4,025
          <span class="font-medium-1 grey darken-1 text-bold-400">kcal</span>
        </h3>
      </div>
      <div class="card-content">
        <div id="donut-chart3" class="height-250 donut3">
        </div>
        <div class="card-body text-center">
          <span class="font-large-1 d-block mb-1">5000</span>
          <span class="danger font-medium-1">kcla Today's Target</span>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row match-height">
  <div class="col-xl-8 col-lg-12">
    <div class="card">
      <div class="card-header pb-0">
        <h4 class="card-title">Sales Per Visit</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <div class="chart-info mb-2">
            <span class="text-uppercase mr-3"><i class="fa fa-circle primary font-small-2 mr-1"></i> Sales</span>
            <span class="text-uppercase"><i class="fa fa-circle warning font-small-2 mr-1"></i> Visits</span>
          </div>
          <div id="line-area-chart" class="height-300 lineAreaChart mb-1">
             <x-chartist class="" [data]="lineAreaChart.data" [type]="lineAreaChart.type" [options]="lineAreaChart.options"
                            [responsiveOptions]="lineAreaChart.responsiveOptions" [events]="lineAreaChart.events">

                        </x-chartist> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-12">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <h4 class="card-title">DAILY DIET</h4>
          <p class="card-text">Some quick example text to build on the card.</p>
        </div>
        <ul class="list-group">
          <li class="list-group-item">
            <span class="badge bg-primary float-right">4</span> Protein Milk
          </li>
          <li class="list-group-item">
            <span class="badge bg-info float-right">2</span> oz Water
          </li>
          <li class="list-group-item">
            <span class="badge bg-warning float-right">6</span> Vegetable Juice
          </li>
          <li class="list-group-item">
            <span class="badge bg-success float-right">1</span> Sugar Free Jello-O
          </li>
          <li class="list-group-item">
            <span class="badge bg-danger float-right">3</span> Protein Meal
          </li>
        </ul>
        <div class="card-body">
          <a class="card-link success">Card link</a>
          <a class="card-link success">Another link</a>
        </div>
      </div>
    </div>
  </div>
</div>
-->
@endsection
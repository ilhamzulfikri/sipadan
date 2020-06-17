<!-- Menghubungkan dengan view template master -->
@extends('tema')
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
<div class="main-panel">
  <!-- BEGIN : Main Content-->
  <div class="main-content">
    <div class="content-wrapper"><!-- Wizard Starts -->
      <div class="row">
        <div class="col-sm-12">
          <div class="content-header">KSA</div>
        </div>
      </div>
      <!-- File export table -->
      <section id="compact-style">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">DAFTAR KONTRAK</h4>
                <p class="card-text"></p>
              </div>
              <div class="card-content ">
                <div class="card-body card-dashboard table-responsive">
                  @if (session('status'))
                  <br>
                  <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{session('status')}}
                  </div>
                  @endif
            <!--<table class="table table-bordered file-export">
              <table class="table display nowrap table-striped scroll-horizontal">-->
                <table class="table table-striped compact">
                  <thead>
                <!--
                  <tr bgcolor="#008184" style="color:#B3E2E3">-->
                    <tr>
                      <th><button type="button" class="btn mr-1 mb-1 btn-light btn-sm"><i class="fa ft-grid"></i></button></th>
                      <th>PEKERJAAN</th>
                      <th>LOKASI</th>
                      <th>BIDANG</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($notadinas as $nd)
                    <tr>
                      <td>
                        @if(Session::get('bidang') == 'KSA')
                        <a class="btn mr-1 mb-1 btn-primary btn-sm" href="{{ url('tagihan') }}/{{ $nd->notadinas_id }}"> <i class="fa ft-edit-2"></i></a>
                        @else
                        <a class="btn mr-1 mb-1 btn-primary btn-sm" href="#" data-toggle="popover" data-content="Menu ini hanya dapat diakses oleh user KSA"
                        data-trigger="hover" data-original-title="INFO"><i class="fa ft-edit-2"></i></a>
                        @endif
                      </td>
                      <td>{{ $nd->pekerjaan }}</td>
                  <!--
                  <td>@rupiah($nd->nilai_rab)</td>
                -->
                <td>{{ $nd->lokasi }}</td>
                <td><button type="button" class="mr-1 mb-1 btn btn-raised btn-outline-dark btn-sm"><i class="fa fa-user"></i> {{ strtoupper($nd->bidang) }}</button></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- File export table -->

@endsection
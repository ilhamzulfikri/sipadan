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
          <div class="content-header">ADDENDUM</div>
        </div>
      </div>
      <!-- File export table -->
      <section id="compact-style">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Daftar Pekerjaan</h4>
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
                <table class="table table-striped compact" id="tabelhpe" name="tabelhpe">
                  <thead>
                <!--
                  <tr bgcolor="#008184" style="color:#B3E2E3">-->
                    <tr>
                      <th> <button type="button" class="btn mr-1 mb-1 btn-light btn-sm"><i class="fa ft-grid"></i></button></th>
                      <th>TGL</th>
                      <th>PEKERJAAN</th>
                  <!--
                    <th>Sumber Dana</th> -->
                    <th>NILAI</th>
                  <!--
                    <th>No PRK</th>  -->
                    <th>LOKASI</th>
                    <th>VENDOR</th>
                    <th>BIDANG</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($notadinas as $nd)
                  <tr>
                    <td>
                      <a class="btn mr-1 mb-1 btn-danger btn-sm" href="{{ url('#') }}/{{ $nd->id }}"> <i class="fa ft-edit-2"></i></a>
                      
                    </td>
                    <td>
                      {{  date('d/m/Y', strtotime($nd->tgl_notadinas)) }}
                    </td>
                    <td>{{ $nd->pekerjaan }}</td>
                  <!--
                    <td>{{ $nd->sumber_dana }}</td> -->
                    <td>@rupiah($nd->nilai_rab)</td>
                  <!--
                    <td>{{ $nd->no_prk }}</td> -->
                    <td>{{ $nd->lokasi }}</td>
                    <td>{{ $nd->vendor_pemenang }}</td>
                    <td><button type="button" class="mr-1 mb-1 btn btn-raised btn-outline-dark btn-sm"><i class="fa fa-user"></i> {{ strtoupper($nd->bidang) }}</button></td>
                  </tr>
                  @endforeach
                </tbody>
              <tfoot><!--
                <tr bgcolor="#11A5C8">
                  <th>No Nota Dinas</th>
                  <th>Tgl Nota Dinas</th>
                  <th>Pekerjaan</th>
                  
                  <th>Sumber Dana</th> 
                  <th>Nilai RAB</th>
                  
                  <th>No PRK</th>  
                  <th>Lokasi</th>
                  <th>Bidang</th>
                  <th>Status</th>
                </tr> -->
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- File export table -->

@endsection

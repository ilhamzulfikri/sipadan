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
          <div class="content-header">MONITORING</div>
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
                <table class="table table-striped compact" id="uruttgl">
                  <thead>
                <!--
                  <tr bgcolor="#008184" style="color:#B3E2E3">-->
                    <tr>
                      <th> <button type="button" class="btn mr-1 mb-1 btn-light btn-sm"><i class="fa ft-grid"></i></button></th>
                      <th>TGL NOTADINAS</th>
                      <th>PEKERJAAN</th>
                      <th>LOKASI</th>
                      <th>BIDANG</th>
                      <th>TAHAP</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($notadinas as $nd)
                    <tr>
                      <td>
                        <a class="btn mr-1 mb-1 btn-primary btn-sm" href="{{ url('monitoring') }}/{{ $nd->id }}"> <i class="fa ft-search"></i></a>
                      </td>
                      <td><p class="text-uppercase">{{ $nd->tgl_notadinas }}</p></td>
                      <td><p class="text-uppercase">{{ $nd->pekerjaan }}</p>
                       @if(isset($nd->hpe->khs))
                       @if($nd->hpe->khs == '1') <span class="badge badge-pill badge-info"> KHS </span> 
                     @endif</td>@endif
                  <!--
                  <td>@rupiah($nd->nilai_rab)</td>
                -->
                <td><p class="text-uppercase">{{ $nd->lokasi }}</p></td>
                <td><button type="button" class="mr-1 mb-1 btn btn-raised btn-outline-dark btn-sm"><i class="fa fa-user"></i> {{ strtoupper($nd->bidang) }}</button></td>
                <td>
                  @if(isset($nd->kontrak->id))
                  @if($nd->kontrak->selesai == NULL)
                  <span class="badge badge-danger text-uppercase">Pekerjaan</span>
                  @else
                  <span class="badge badge-success text-uppercase">Selesai</span>
                  @endif
                  @elseif(isset($nd->prosespengadaan->id) && $nd->prosespengadaan['selesai'] == '1')
                  <span class="badge badge-info text-uppercase">Input Kontrak</span>
                  @elseif(isset($nd->prosespengadaan->id) && $nd->prosespengadaan['selesai'] == NULL)
                  <span class="badge badge-secondary text-uppercase">Lelang Kontrak</span>
                  @elseif(isset($nd->hpe->id))
                  <span class="badge badge-secondary text-uppercase">Lelang Kontrak</span>
                  @else
                  <span class="badge badge-warning text-uppercase">Pembuatan RKS</span>
                  @endif
                </td>
                  <!--
                  <td>
                    @if($nd->kontrak['tgl_akhir_kontrak'] != NULL)
                      @if($nd->kontrak['tgl_akhir_kontrak'] < date('Y-m-d'))
                          <span class="badge badge-danger">Jadwal Sudah Lewat</span>
                      @else
                          <span class="badge badge-success">{{ date('Y-m-d') }}</span>
                      @endif                      
                    @endif
                  </td>-->
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
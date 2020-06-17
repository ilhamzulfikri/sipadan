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
    <div class="content-header">Perencanaan</div>
  </div>
</div>
<section id="icon-tabs">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Input HPE/RKS</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="ft-user"></i> NOTA DINAS</a>
                <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="ft-clipboard"></i> RKS & HPE</a>
            </nav>
          @foreach($notadinas as $nd)
            <form action="tambah" method="post" class="form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <!-- Step 1 -->
              <!--<h6>Isi Data</h6> -->
              <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <!--<fieldset> -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="firstName2">Nomor Nota Dinas</label>
                      <input type="text" class="form-control" id="nonotadinas" name="nonotadinas" value="{{ $nd->no_notadinas }}" required="required" readonly="readonly">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="date2">Tanggal Nota Dinas</label>
                      <div class='input-group'>
                        <input type='date' class="form-control date" data-value="date('Y-m-d')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required" readonly="readonly">
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <span class="fa fa-calendar-o"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="emailAddress3">Pekerjaan</label>
                      <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $nd->pekerjaan }}" required="required" readonly="readonly">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="lastName2">Sumber Dana</label>
                      <input type="text" class="form-control" id="sumberdana" name="sumberdana" value="{{ $nd->sumber_dana }}" required="required" readonly="readonly">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="emailAddress3">Nilai RAB</label>
                      <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                      </div>
                      <input type="text" class="form-control uang" id="nilairab" name="nilairab" value="{{ $nd->nilai_rab }}" required="required" readonly="readonly">
                    </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="emailAddress3">Nomor PRK</label>
                      <input type="text" class="form-control" id="noprk" name="noprk" value="{{ $nd->no_prk }}" required="required" readonly="readonly">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="emailAddress3">Lokasi</label>
                      <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $nd->lokasi }}" required="required" readonly="readonly">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="emailAddress3">Bidang</label>
                      <input type="text" class="form-control text-uppercase" id="bidang" name="bidang" value="{{ $nd->bidang }}" required="required" readonly="readonly">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="emailAddress3">Download</label>
                      <div class="form-group">
                      <a class="btn btn-info" role="button" href="/sipadan/public/{{ $nd->upload_notadinas }}" ><i class="ft-x"></i>Nota Dinas </a>
                      <a class="btn btn-success" role="button" href="/sipadan/public/{{ $nd->upload_rab }}" ><i class="ft-x"></i>RAB </a>
                      @if (empty($nd->upload_justifikasi))
                      @else
                      <a class="btn btn-danger" role="button" href="/sipadan/public/{{ $nd->upload_justifikasi }}" ><i class="ft-x"></i>Justifikasi </a>
                      @endif
                      
                    </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

              <input type="hidden" class="form-control" id="notadinas_id" name="notadinas_id" value="{{ $nd->id }}" required="required">
              
              <!--<fieldset> -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="firstName2">Nomor Nota Dinas MUP3</label>
                      <input type="text" class="form-control" id="nonotadinasrks" name="nonotadinasrks" required="required">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="date2">Tanggal Nota Dinas</label>
                      <div class='input-group'>
                        <input type='date' class="form-control date" data-value="date('Y-m-d')" placeholder="Tanggal RKS" id="tglnotadinasrks" name="tglnotadinasrks" value="{{date('Y-m-d')}}" required="required">
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <span class="fa fa-calendar-o"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="firstName2">Nomor RKS</label>
                      <input type="text" class="form-control" id="norks" name="norks" required="required">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="date2">Tanggal RKS</label>
                      <div class='input-group'>
                        <input type='date' class="form-control date" data-value="date('Y-m-d')" placeholder="Tanggal RKS" id="tlgrks" name="tglrks" value="{{date('Y-m-d')}}" required="required">
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <span class="fa fa-calendar-o"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="emailAddress3">Nilai HPE</label>
                      <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                      </div>
                      <input type="text" class="form-control uang" id="nilaihpe" name="nilaihpe" required="required">
                    </div>
                      
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="emailAddress3">Waktu Pekerjaan</label>
                      <div class="input-group">
                      <input type="text" class="form-control" id="waktupekerjaan" name="waktupekerjaan" required="required">
                      <!--
                      <div class="input-group-append">
                        <select class="input-group-text" id="lamapekerjaan" name="lamapekerjaan" required="required">
                          <option value="Hari">Hari</option>
                          <option value="Bulan">Bulan</option>
                          <option value="Tahun">Tahun</option>
                      </select>
                      </div>
                    -->
                    </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="emailAddress3">Metode Pengadaan</label>
                      <select class="form-control" id="metode" name="metode" required="required">
                          <option value="Lelang Terbatas">Lelang Terbatas</option>
                          <option value="Lelang Terbuka">Lelang Terbuka</option>
                          <option value="Pengadaan Langsung">Pengadaan Langsung</option>
                          <option value="Penunjukan Langsung">Penunjukan Langsung</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="emailAddress3">Vendor</label>
                      <select class="form-control" id="vendor" name="vendor" required="required">
                          <option disabled selected value=""> Pilih Vendor </option>
                      @foreach($vendor as $ven)
                          <option value="{{ $ven->nama }}">{{ $ven->nama }}</option>
                      @endforeach
                     </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                     <div class="form-group">
                      <label for="emailAddress3">KHS</label>
                      <div class="input-group ">
                      <input type="checkbox" id="khs" name="khs" value="1" class="switchery"/>
                    </div>
                    </div>
                  </div>
                </div>
                 <!--</fieldset> -->
                

                <h4 class="form-section"><i class="ft-user"></i> Upload File</h4>
              <!--<fieldset> -->
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="proposalTitle2">Upload Nota Dinas MUP3</label>
                      <input type="file" class="form-control-file" id="upload_nd_mup3" name="upload_nd_mup3" required="required" accept="application/pdf">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="proposalTitle2">Upload HPE</label>
                      <input type="file" class="form-control-file" id="uploadhpe" name="uploadhpe" required="required" accept="application/pdf">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="emailAddress4">Upload RKS</label>
                      <input type="file" class="form-control-file" id="uploadrks" name="uploadrks" required="required" accept="application/pdf">
                    </div>
                    </div>
                  </div>

                  <input type="hidden" class="form-control" id="user" name="user" required="required">

                  <div class="form-actions right">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-primary mr-1" ><i class="fa fa-check-square-o"></i> Kembali</a> 
                    <button type="reset" class="btn btn-raised btn-warning mr-1">
                    <i class="ft-x"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-raised btn-primary">
                    <i class="fa fa-check-square-o"></i> Submit
                    </button>
                  </div>
                </div>
              </div>
              <!-- </fieldset>-->
            </form>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- // Basic form layout section end -->
@endsection
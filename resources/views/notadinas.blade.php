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
    <div class="content-header">USER BAGIAN</div>
  </div>
</div>
<section id="icon-tabs">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Input Nota Dinas</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            @if (session('status'))
            <br>
          <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{session('status')}}
          </div>
          @endif
            <form action="notadinas/tambah" method="post" class="form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <!-- Step 1 -->
              <!--<h6>Isi Data</h6> -->
              <h4 class="form-section"><i class="ft-user"></i> Isi Data</h4>
              <!--<fieldset> -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="firstName2">Nomor Nota Dinas</label>
                      <input type="text" class="form-control" id="nonotadinas" name="nonotadinas" required="required">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="date2">Tanggal Nota Dinas</label>
                      <div class='input-group'>
                        <input type='date' class="form-control date" data-value="date('Y-m-d')" placeholder="Tanggal Nota Dinas" id="tgl" value="{{date('Y-m-d')}}" name="tlgnotadinas" required="required"/>
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
                      <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required="required">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="lastName2">Sumber Dana</label>
                      <input type="text" class="form-control" id="sumberdana" name="sumberdana" required="required">
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
                      <input type="text" class="form-control uang" id="nilairab" name="nilairab" required="required">
                    </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="emailAddress3">Nomor PRK</label>
                      <input type="text" class="form-control" id="noprk" name="noprk" required="required">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="emailAddress3">Lokasi</label>
                      <input type="text" class="form-control" id="lokasi" name="lokasi" required="required">
                    </div>
                  </div>
                </div>
                 <!--</fieldset> -->
                
              <!--<h6>Isi Data</h6> -->
              <h4 class="form-section"><i class="ft-user"></i> Upload File</h4>
              <!--<fieldset> -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="proposalTitle2">Upload Nota Dinas</label>
                      <input type="file" class="form-control-file" id="uploadnotadinas" name="uploadnotadinas" required="required" >
                    </div>
                    <div class="form-group">
                      <label for="emailAddress4">Upload RAB</label>
                      <input type="file" class="form-control-file" id="uploadrab" name="uploadrab" required="required" >
                    </div>
                    <div class="form-group">
                      <label for="videoUrl2">Upload Justifikasi (Opsional)</label>
                      <input type="file" class="form-control-file" id="uploadjustifikasi" name="uploadjustifikasi" >
                    </div>
                    </div>
                  </div>

                  <input type="hidden" class="form-control" id="user" name="user" required="required">

                  <div class="form-actions right">
                    <button type="reset" class="btn btn-raised btn-warning mr-1">
                    <i class="ft-x"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-raised btn-primary">
                    <i class="fa fa-check-square-o"></i> Submit
                    </button>
                  </div>
              <!-- </fieldset>-->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- // Basic form layout section end -->
@endsection
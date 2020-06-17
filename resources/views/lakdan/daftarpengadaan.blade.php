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
          <div class="content-header">Pengadaan</div>
        </div>
      </div>
      <section id="icon-tabs">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Proses Pengadaan</h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">NOTA DINAS</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">RKS & HPE</a>
                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">JADWAL PENGADAAN</a>
                    </div>
                  </nav>
                  @foreach($notadinas as $nd)
                  <form action="tambah" method="post" class="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- Step 1 -->
                    <!--<h6>Isi Data</h6> -->
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <!--<h4 class="form-section"><i class="ft-user"></i> Nota Dinas</h4>-->
                        <!--<fieldset> -->
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="firstName2">Nomor Nota Dinas</label>
                                <input type="text" class="form-control" id="nonotadinas" name="nonotadinas" value="{{ $nd->no_notadinas }}" required="required" disabled>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="date2">Tanggal Nota Dinas</label>
                                <div class='input-group'>
                                  <input type='date' class="form-control pickadate" data-value="{{ $nd->tgl_notadinas }}" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required" disabled>
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
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $nd->pekerjaan }}" required="required" disabled>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="lastName2">Sumber Dana</label>
                                <input type="text" class="form-control" id="sumberdana" name="sumberdana" value="{{ $nd->sumber_dana }}" required="required" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="emailAddress3">Nilai RAB</label>
                                <input type="number" class="form-control" id="nilairab" name="nilairab" value="{{ $nd->nilai_rab }}" required="required" disabled>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="emailAddress3">Nomor PRK</label>
                                <input type="text" class="form-control" id="noprk" name="noprk" value="{{ $nd->no_prk }}" required="required" disabled>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="emailAddress3">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $nd->lokasi }}" required="required" disabled>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="emailAddress3">Bidang</label>
                                <input type="text" class="form-control text-uppercase" id="bidang" name="bidang" value="{{ $nd->bidang }}" required="required" disabled>
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
                        <!--</fieldset> -->
                        
              <!--<h6>Isi Data</h6> 
              <h4 class="form-section"><i class="ft-user"></i> Download File</h4>
              <!--<fieldset> 
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <a class="btn btn-info" role="button" href="/sipadan/public/{{ $nd->upload_notadinas }}" >Nota Dinas </a>
                      <a class="btn btn-success" role="button" href="/sipadan/public/{{ $nd->upload_rab }}" >RAB </a>
                      @if (empty($nd->upload_justifikasi))
                      @else
                      <a class="btn btn-danger" role="button" href="  public/{{ $nd->upload_justifikasi }}" >Justifikasi </a>
                      @endif
                      
                    </div>
                    </div>
                </div>
              -->
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <input type="hidden" class="form-control" id="notadinas_id" name="notadinas_id" value="{{ $nd->id }}" required="required">

                <!--<h4 class="form-section"><i class="ft-user"></i> RKS </h4> -->
                <!--<fieldset> -->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstName2">Nomor Nota Dinas MUP3</label>
                        <input type="text" class="form-control" id="nonotadinasrks" name="nonotadinasrks" value="{{ $nd->hpe->no_notaman }}" required="required">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="date2">Tanggal Nota Dinas</label>
                        <div class='input-group'>
                          <input type='date' class="form-control pickadate" data-value="{{ $nd->hpe->tgl_notaman }}" placeholder="Tanggal RKS" id="tglnotadinasrks" name="tglnotaman" value="{{ $nd->hpe->tgl_notaman }}" required="required">
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
                        <input type="text" class="form-control" id="norks" name="norks"  value="{{ $nd->hpe->no_rks }}" required="required">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="date2">Tanggal RKS</label>
                        <div class='input-group'>
                          <input type='date' class="form-control pickadate" data-value="{{ $nd->hpe->tgl_rks }}" placeholder="Tanggal RKS" id="tlgrks" name="tglrks" value="{{ $nd->hpe->tgl_rks }}" required="required">
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
                          <input type="number" class="form-control" id="nilaihpe" name="nilaihpe" value="{{ $nd->hpe->nilai_hpe }}" required="required">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="emailAddress3">Waktu Pekerjaan (Hari)</label>
                        <div class="input-group">
                          <input type="number" class="form-control" id="waktupekerjaan" name="waktupekerjaan" value="{{ $nd->hpe->waktu }}" required="required">
                          <div class="input-group-append">
                            <span class="input-group-text"> Hari</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="emailAddress3">Metode Pengadaan</label>
                        <input type="text" class="form-control" id="metode" name="metode"  value="{{ $nd->hpe->metode }}" required="required">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="emailAddress3">Download</label>
                        <div class="form-group">
                          <a class="btn btn-info" role="button" href="/sipadan/public/{{ $nd->hpe->upload_hpe }}" ><i class="ft-x"></i>HPE </a>
                          <a class="btn btn-success" role="button" href="/sipadan/public/{{ $nd->hpe->upload_rks }}" ><i class="ft-x"></i>RKS </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--</fieldset> -->
                
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                  <!--<h4 class="form-section"><i class="ft-user"></i> Jadwal Pengadaan</h4>-->
                  <!--<fieldset> -->
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>NO</th>
                              <th>TAHAP</th>
                              <th>TGL AWAL</th>
                              <th>TGL AKHIR</th>
                              <th>DURASI</th>
                              <th>REALIASI</th>
                              <th>KET</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php $no=0 @endphp
                            <tr>
                              <td>{{$no=$no+1}}</td>
                              <td>Pengumuman Pengadaan</td>
                              <td>
                                <input type='date' class="form-control datepicker" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>
                                <input type='date' class="form-control datepicker" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>{{ $nd->tgl_rks - $nd->tgl_notadinas }}</td>
                              <td>{{ strtoupper($nd->bidang) }}</td>
                              <td> </td>
                            </tr>
                            <tr>
                              <td>{{$no=$no+1}}</td>
                              <td>Pendaftaran dan Download Dokumen Pelelangan / RKS</td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>{{ $nd->tgl_rks - $nd->tgl_notadinas }}</td>
                              <td>{{ strtoupper($nd->bidang) }}</td>
                              <td> </td>
                            </tr>
                            <tr>
                              <td>{{$no=$no+1}}</td>
                              <td>Pemberian Penjelasan</td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>{{ $nd->tgl_rks - $nd->tgl_notadinas }}</td>
                              <td>{{ strtoupper($nd->bidang) }}</td>
                              <td> </td>
                            </tr>
                            <tr>
                              <td>{{$no=$no+1}}</td>
                              <td>Upload Dokumen Penawaran</td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>{{ $nd->tgl_rks - $nd->tgl_notadinas }}</td>
                              <td>{{ strtoupper($nd->bidang) }}</td>
                              <td> </td>
                            </tr>
                            <tr>
                              <td>{{$no=$no+1}}</td>
                              <td>Pembukaan Dokumen Penawaran</td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>{{ $nd->tgl_rks - $nd->tgl_notadinas }}</td>
                              <td>{{ strtoupper($nd->bidang) }}</td>
                              <td> </td>
                            </tr>
                            <tr>
                              <td>{{$no=$no+1}}</td>
                              <td>Evaluasi Penawaran</td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>{{ $nd->tgl_rks - $nd->tgl_notadinas }}</td>
                              <td>{{ strtoupper($nd->bidang) }}</td>
                              <td> </td>
                            </tr>
                            <tr>
                              <td>{{$no=$no+1}}</td>
                              <td>Evaluasi Dokumen Kualifikasi</td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>{{ $nd->tgl_rks - $nd->tgl_notadinas }}</td>
                              <td>{{ strtoupper($nd->bidang) }}</td>
                              <td> </td>
                            </tr>
                            <tr>
                              <td>{{$no=$no+1}}</td>
                              <td>Pembuktian Kualifikasi</td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>{{ $nd->tgl_rks - $nd->tgl_notadinas }}</td>
                              <td>{{ strtoupper($nd->bidang) }}</td>
                              <td> </td>
                            </tr>
                            <tr>
                              <td>{{$no=$no+1}}</td>
                              <td>Klarifikasi & Negosiasi Harga</td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>{{ $nd->tgl_rks - $nd->tgl_notadinas }}</td>
                              <td>{{ strtoupper($nd->bidang) }}</td>
                              <td> </td>
                            </tr>
                            <tr>
                              <td>{{$no=$no+1}}</td>
                              <td>Usulan Calon Pemenang</td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>{{ $nd->tgl_rks - $nd->tgl_notadinas }}</td>
                              <td>{{ strtoupper($nd->bidang) }}</td>
                              <td> </td>
                            </tr>
                            <tr>
                              <td>{{$no=$no+1}}</td>
                              <td>Upload BA Hasil Pengadaan</td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>{{ $nd->tgl_rks - $nd->tgl_notadinas }}</td>
                              <td>{{ strtoupper($nd->bidang) }}</td>
                              <td> </td>
                            </tr>
                            <tr>
                              <td>{{$no=$no+1}}</td>
                              <td>Penetapan Pemenang</td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>{{ $nd->tgl_rks - $nd->tgl_notadinas }}</td>
                              <td>{{ strtoupper($nd->bidang) }}</td>
                              <td> </td>
                            </tr>
                            <tr>
                              <td>{{$no=$no+1}}</td>
                              <td>Pengumuman Pemenang</td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>{{ $nd->tgl_rks - $nd->tgl_notadinas }}</td>
                              <td>{{ strtoupper($nd->bidang) }}</td>
                              <td> </td>
                            </tr>
                            <tr>
                              <td>{{$no=$no+1}}</td>
                              <td>Masa Sanggah Hasil Pengadaan</td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>{{ $nd->tgl_rks - $nd->tgl_notadinas }}</td>
                              <td>{{ strtoupper($nd->bidang) }}</td>
                              <td> </td>
                            </tr>
                            <tr>
                              <td>{{$no=$no+1}}</td>
                              <td>Surat Penunjukan Penyedia Barang/Jasa</td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>{{ $nd->tgl_rks - $nd->tgl_notadinas }}</td>
                              <td>{{ strtoupper($nd->bidang) }}</td>
                              <td> </td>
                            </tr>
                            <tr>
                              <td>{{$no=$no+1}}</td>
                              <td>Penandatangan Kontrak</td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>
                                <input type='date' class="form-control" data-value="date('Y-m-j')" placeholder="Tanggal Nota Dinas" id="tlgnotadinas" name="tlgnotadinas" value="{{ $nd->tgl_notadinas }}" required="required">
                              </td>
                              <td>{{ $nd->tgl_rks - $nd->tgl_notadinas }}</td>
                              <td>{{ strtoupper($nd->bidang) }}</td>
                              <td> </td>
                            </tr>
                          </tbody>
                        </table>
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
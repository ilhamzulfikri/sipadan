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
    <div class="content-header">Pengaturan</div>
  </div>
</div>
 <!-- File export table -->
<section id="file-export">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Manajemen User</h4>
          <p class="card-text"></p>
        </div>
        <div class="card-content ">
          <div class="card-body">
            <div class="form-group">
                  <!-- basic buttons -->
                  <a href="register" class="btn btn-raised btn-success btn-min-width mr-1 mb-1">Tambah User</a>
                </div>
            <table class="table">
              <thead>
                <tr class="darken-4">
                  <th>UPI</th>
                  <th>AP</th>
                  <th>USER</th>
                  <th>NAMA</th>
                  <th>EMAIL</th>
                  <th>NO HP</th>
                  <th>BIDANG</th>
                </tr>
              </thead>
              <tbody>
              @foreach($users as $p)
                <tr>
                  <td>{{ $p->upi }}</td>
                  <td>{{ $p->ap }}</td>
                  <td>{{ $p->user }}</td>
                  <td>{{ $p->nama }}</td>
                  <td>{{ $p->email }}</td>
                  <td>{{ $p->nohp }}</td>
                  <td>{{ strtoupper($p->bidang) }}</td>
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
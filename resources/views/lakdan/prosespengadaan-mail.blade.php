<style>
  table, td, th {
    border-collapse: collapse;
    table-layout:fixed;
    
  }

  table#A td,th {
    padding: 20px;
    border:1px solid #e3e3e3;
  }



  th, td {
    text-align: left;
    padding-left: 15px;
    padding-bottom: 5px;
  }
</style>
<font face="Cambria">
  <P>Kepada Yth <b>{{ $jabatan }}</b>. </P>
  <p>Berikut disampaikan pemberitahuan pekerjaan dengan rincian sebagai berikut :</p>

  <table>
    <tr>
      <td >Bidang</td>
      <td> : </td>
      <td><b>{{ strtoupper($bidang) }} </b></td>
    </tr>
    <tr>
      <td>Pekerjaan</td>
      <td> : </td>
      <td style="white-space:nowrap;"> <b>{{ $pekerjaan }} </b></td>
    </tr>
    <tr>
      <td>Sumber Dana</td>
      <td> : </td>
      <td style="white-space:nowrap;"> <b>{{ $sumberdana }} </b></td>
    </tr>
    <tr>
      <td>No PRK</td>
      <td> : </td>
      <td style="white-space:nowrap;"> <b>{{ $noprk }} </b></td>
    </tr>
    <tr>
      <td>Lokasi</td>
      <td> : </td>
      <td style="white-space:nowrap;"> <b>{{ $lokasi }} </b></td>
    </tr>
    <tr>
      <td>Nilai </td>
      <td> : </td>
      <td><b> {{ $nilairab }} </b></td>
    </tr>
    <tr>
      <td>Waktu Pekerjaan</td>
      <td> : </td>
      <td><b> {{ $waktu }} Hari</b> </td>
    </tr>
    <tr>
      <td>Metode</td>
      <td> : </td>
      <td> <b>{{ $metode }}</b> </td>
    </tr>
    @if($metode == "Pengadaan Langsung" || $metode == "Penunjukan Langsung")
    <tr>
      <td>Pelaksana</td>
      <td> : </td>
      <td> <b>{{ $pelaksana }} </b></td>
    </tr>
    @endif
  </table>
  @if(is_null($pelaksana))
  <p>Pekerjaan tersebut telah ditetapkan <b>Jadwal Pengadaaan</b> dengan data sebagai berikut :</p>
  <table id="A" style="border-collapse: collapse;table-layout:fixed;padding: 20px; border:1px solid #e3e3e3;border-radius: 5px;" class="table">
    <thead>
      <tr style="background: #03A9F4;">
        <th>TAHAP</th>
        <th>TGL AWAL</th>
        <th>TGL AKHIR</th>
      </tr>
    </thead>
    <tbody>
      @foreach($jadwal as $j)
      <tr>
        <td>
          @if($metode == "Lelang Terbuka")
          Pengumuman Pengadaan
          @else
          Undangan Pengadaan
        @endif</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_aw_pengumuman)) }}</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_ak_pengumuman)) }}</td>
      </tr>
      <tr>
        <td>Pendaftaran dan Download Dokumen Pelelangan / RKS</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_aw_pendaftaran)) }}</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_ak_pendaftaran)) }}</td>
      </tr>
      <tr>
        <td>Pemberian Penjelasan</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_aw_penjelasan)) }}</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_ak_penjelasan)) }}</td>
      </tr>
      <tr>
        <td>Upload Dokumen Penawaran</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_aw_upload_penawaran)) }}</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_ak_upload_penawaran)) }}</td>
      </tr>
      <tr>
        <td>Pembukaan Dokumen Penawaran</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_aw_pembukaan_penawaran)) }}</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_ak_pembukaan_penawaran)) }}</td>
      </tr>
      <tr>
        <td>Evaluasi Penawaran</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_aw_evaluasi_penawaran)) }}</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_ak_evaluasi_penawaran)) }}</td>
      </tr>
      @if($metode == "Lelang Terbuka")
      <tr>
        <td>Evaluasi Dokumen Kualifikasi</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_aw_evaluasi_dokumen)) }}</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_ak_evaluasi_dokumen)) }}</td>
      </tr>
      <tr>
        <td>Pembuktian Kualifikasi</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_aw_pembuktian_kualifikasi)) }}</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_ak_pembuktian_kualifikasi)) }}</td>
      </tr>
      @endif
      <tr>
        <td>Klarifikasi & Negosiasi Harga</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_aw_klarifikasi_nego)) }}</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_ak_klarifikasi_nego)) }}</td>
      </tr>
      <tr>
        <td>Usulan Calon Pemenang</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_aw_calon_pemenang)) }}</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_ak_calon_pemenang)) }}</td>
      </tr>
      <tr>
        <td>Upload BA Hasil Pengadaan</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_aw_upload_ba_pengadaan)) }}</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_ak_upload_ba_pengadaan)) }}</td>
      </tr>
      <tr>
        <td>Penetapan Pemenang</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_aw_penetapan_pemenang)) }}</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_ak_penetapan_pemenang)) }}</td>
      </tr>
      <tr>
        <td>Pengumuman Pemenang</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_aw_pengumuman_pemenang)) }}</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_ak_pengumuman_pemenang)) }}</td>
      </tr>
      <tr>
        <td>Masa Sanggah Hasil Pengadaan</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_aw_masa_sanggah)) }}</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_ak_masa_sanggah)) }}</td>
      </tr>
      <tr>
        <td>Surat Penunjukan Penyedia Barang/Jasa</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_aw_surat_penunjukan)) }}</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_ak_surat_penunjukan)) }}</td>
      </tr>
      <tr>
        <td>Penandatangan Kontrak</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_aw_teken_kontrak)) }}</td>
        <td>{{ date("d/m/Y", strtotime($j->tgl_ak_teken_kontrak)) }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <p>Pekerjaan tersebut sedang dilaksanakan tahap <b>input kontrak</b> oleh pelaksana pengadaan.</p>
  @endif
  <p>Demikian disampaikan, atas perhatian dan kerja samanya diucapkan terima kasih.</p>

  <a href="http://10.15.35.28/sipadan/"><img src="http://10.15.35.28/sipadan/public/app-assets/img/sipadan3.png" alt="KLIK UNTUK AKSES SIPADAN" style="width:200px;height:50px;"/></a></p></font>
</font>
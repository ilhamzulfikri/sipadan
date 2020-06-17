<style>
  table, td, th {
    border-collapse: collapse;
    table-layout:fixed;
    padding: 6px;
    border:1px solid #e6eceb;
  }

  table th {
    background: #0093b7;
    color: #fff;
  }

  th, td {
    text-align: left;
    padding-left: 10px;
    padding-bottom: 3px;
  }
</style>
<font face="Cambria">
  <center><h3><b>INFORMASI SIPADAN</b></h3></center>


  <h4>Daftar Nota Dinas pekerjaan yang belum dibuatkan <b><font color="red">RKS</font></b> :</h4>
  <table style="border-collapse: collapse;table-layout:fixed;padding: 6px; border:1px solid #e6eceb;border-radius: 3px;" class="table">
    <thead>
      <tr style="background: #0093b7;">
        <font color="#fff">
          <th>PEKERJAAN</th>
          <th>NILAI</th>
          <th>LOKASI</th>
          <th>BIDANG</th>
          <th>TGL NOTA DINAS</th>
          <th>DURASI</th>
        </font>
      </tr>
    </thead>
    <tbody>
      @foreach($notadinas as $nd)
      <tr>
        <td>{{ $nd->pekerjaan }}</td>
        <td>@rupiah($nd->nilai_rab)</td>
        <td>{{ $nd->lokasi }}</td>
        <td>{{ strtoupper($nd->bidang) }}</td>
        <td>{{  date('d/m/Y', strtotime($nd->tgl_notadinas)) }}</td>
        @php
        $tglawal = new DateTime($nd->tgl_notadinas);
        $tglskrg = new DateTime(date("Y-m-d"));
        $hari = $tglskrg->diff($tglawal);
        @endphp
        @if($hari->days > 2)
        <td  style="background: #FF0800;">
          @else
          <td  style="background: #00FF00;">
            @endif
            <b><font color="#fff">> {{ $hari->days }} Hari</font></b>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <br>
    <h4>Daftar pekerjaan yang belum dibuatkan <b><font color="red">Jadwal Lelang</font></b> :</h4>
    <table style="border-collapse: collapse;table-layout:fixed;padding: 6px; border:1px solid #e6eceb;border-radius: 3px;" class="table">
      <thead>
        <tr style="background: #0093b7;">
          <font color="#fff">
            <th>PEKERJAAN</th>
            <th>NILAI</th>
            <th>LOKASI</th>
            <th>BIDANG</th>
            <th>TGL NOTA DINAS MANAGER</th>
            <th>DURASI</th>
          </font>
        </tr>
      </thead>
      <tbody>
        @foreach($prosespengadaan as $p)
        <tr>
          <td>{{ $p->pekerjaan }}</td>
          <td>@rupiah($p->nilai_hpe)</td>
          <td>{{ $p->lokasi }}</td>
          <td>{{ strtoupper($p->bidang) }}</td>
          <td>{{  date('d/m/Y', strtotime($p->tgl_notaman)) }}</td>
          @php
          $tglawal = new DateTime($p->tgl_notaman);
          $tglskrg = new DateTime(date("Y-m-d"));
          $hari = $tglskrg->diff($tglawal);
          @endphp
          @if($hari->days > 2)
          <td  style="background: #FF0800;">
            @else
            <td  style="background: #00FF00;">
              @endif
              <b><font color="#fff">> {{ $hari->days }} Hari</font></b>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
<!--
      <br>
      <h4>Daftar pekerjaan yang telah melewati <b><font color="red">Tanggal Akhir Kontrak</font></b> :</h4>
      <table style="border-collapse: collapse;table-layout:fixed;padding: 6px; border:1px solid #e6eceb;border-radius: 3px;" class="table">
        <thead>
          <tr style="background: #0093b7;">
            <font color="#fff">
              <th>PEKERJAAN</th>
              <th>NILAI</th>
              <th>LOKASI</th>
              <th>BIDANG</th>
              <th>TGL AKHIR KONTRAK</th>
              <th>DURASI</th>
            </font>
          </tr>
        </thead>
        <tbody>
          @foreach($akhirkontrak as $ak)
          <tr>
            <td>{{ $ak->pekerjaan }}</td>
            <td>@rupiah($ak->nilai_kontrak)</td>
            <td>{{ $ak->lokasi }}</td>
            <td>{{ strtoupper($ak->bidang) }}</td>
            <td>{{  date('d/m/Y', strtotime($ak->tgl_akhir_kontrak)) }}</td>
            @php
            $tglawal = new DateTime($ak->tgl_akhir_kontrak);
            $tglskrg = new DateTime(date("Y-m-d"));
            $hari = $tglskrg->diff($tglawal);
            @endphp
            <td  style="background: #FF0800;">
              <b><font color="#fff">> {{ $hari->days }} Hari</font></b>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    -->
    {{ $akhirkontrak->nama }}

    <p>Demikian disampaikan, atas perhatian dan kerja samanya diucapkan terima kasih.</p>
    <a href="http://10.15.35.28/sipadan/"><img src="http://10.15.35.28/sipadan/public/app-assets/img/sipadan3.png" alt="KLIK UNTUK AKSES SIPADAN" style="width:200px;height:50px;"/></a>
  </font>
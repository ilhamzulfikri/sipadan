<style>
  table, td, th {
    border-collapse: collapse;
    table-layout:fixed;
    padding: 20px;
    border:1px solid #e3e3e3;
  }

  table th {
    background: #03A9F4;
  }

  th, td {
    text-align: left;
    padding-left: 15px;
    padding-bottom: 5px;
  }
</style>
<font face="Cambria">
  <P>INFORMASI <b>SIPADAN</b>.</P>
  <p>Daftar pekerjaan yang telah melewati <b><font color="red">Tanggal Akhir Kontrak</font></b> :</p>
  <table style="border-collapse: collapse;table-layout:fixed;padding: 10px; border:1px solid #e3e3e3;border-radius: 5px;" class="table">
    <thead>
      <tr style="background: #03A9F4;">
        <th>PEKERJAAN</th>
        <th>NILAI</th>
        <th>LOKASI</th>
        <th>BIDANG</th>
        <th>TGL AKHIR KONTRAK</th>
        <th>DURASI</th>
      </tr>
    </thead>
    <tbody>
      @foreach($notadinas as $nd)
      <tr>
        <td>{{ $nd->pekerjaan }}</td>
        <td>@rupiah($nd->nilai_kontrak)</td>
        <td>{{ $nd->lokasi }}</td>
        <td>{{ strtoupper($nd->bidang) }}</td>
        <td>{{  date('d/m/Y', strtotime($nd->tgl_akhir_kontrak)) }}</td>
        @php
        $tglawal = new DateTime($nd->tgl_akhir_kontrak);
        $tglskrg = new DateTime(date("Y-m-d"));
        $hari = $tglskrg->diff($tglawal);
        @endphp
        <td  style="background: #D50000;">
          <b><font color="#fff">> {{ $hari->days }} Hari</font></b>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  
  <p>Demikian disampaikan, atas perhatian dan kerja samanya diucapkan terima kasih.</p>

  <a href="http://10.15.35.28/sipadan/"><img src="http://10.15.35.28/sipadan/public/app-assets/img/sipadan3.png" alt="KLIK UNTUK AKSES SIPADAN" style="width:200px;height:50px;"/></a></p></font>
</font>
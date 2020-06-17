<style>
    table, td, th {
        border-collapse: collapse;
        table-layout:fixed;
    }

    th, td {
        text-align: left;
        padding-left: 15px;
        padding-bottom: 5px;
    }
</style>
<font face="Cambria">
    <P>Kepada Yth  <b>{{ $jabatan }}</b>.</P>
    <p>Berikut disampaikan pemberitahuan pekerjaan dengan rincian sebagai berikut :</p>

    <table>
        <tr>
            <td>Bidang</td>
            <td> : </td>
            <td><b> {{ strtoupper($bidang) }} </b></td>
        </tr>
        <tr>
            <td>No Nota Dinas</td>
            <td> : </td>
            <td><b> {{ $nond }} </b></td>
        </tr>
        <tr>
            <td>Tanggal Nota Dinas</td>
            <td> : </td>
            <td><b> {{ $tglnd }} </b></td>
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
            <td>Nilai</td>
            <td> : </td>
            <td><b> {{ $nilairab }} </b></td>
        </tr>
    </table>
</b>

<p>Selanjutnya untuk dapat diproses sesuai dengan aturan yang berlaku.</p>
<p>Demikian disampaikan, atas perhatian dan kerja samanya diucapkan terima kasih.</p>

<a href="http://10.15.35.28/sipadan/"><img src="http://10.15.35.28/sipadan/public/app-assets/img/sipadan3.png" alt="KLIK UNTUK AKSES SIPADAN" style="width:200px;height:50px;"/></a></p></font>
</font>
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
            <td>Tanggal Mulai Kontrak</td>
            <td> : </td>
            <td><b> {{ $tglnd }}</b> </td>
        </tr>
        <tr>
            <td>Tanggal Akhir Kontrak</td>
            <td> : </td>
            <td><b> {{ $waktu }}</b> </td>
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

<p>Proses pembuatan kontrak sudah selesai, selanjutnya diharapakan kepada <b> {{ $jabatan }} </b> untuk segera melaksanakan pekerjaan tersebut sesuai dengan kontrak pengadaan dan dengan memperhatikan aturan yang berlaku.</p>

<p>Demikian disampaikan, atas perhatian dan kerja samanya diucapkan terima kasih.</p>

<p><b>SIPADAN - PLN UP3 Subulussalam</b></p>
</font>
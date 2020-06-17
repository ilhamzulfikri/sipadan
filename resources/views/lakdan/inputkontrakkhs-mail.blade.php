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
            <td>Pekerjaan</td>
            <td> : </td>
            <td style="white-space:nowrap;"> <b>{{ $pekerjaan }} </b></td>
        </tr>
        <tr>
            <td>Tanggal Mulai Kontrak</td>
            <td> : </td>
            <td><b> {{ $tglmulai }}</b> </td>
        </tr>
        <tr>
            <td>Tanggal Akhir Kontrak</td>
            <td> : </td>
            <td><b> {{ $tglakhir }}</b> </td>
        </tr>
        <tr>
            <td>Lokasi</td>
            <td> : </td>
            <td style="white-space:nowrap;"> <b>{{ $lokasi }} </b></td>
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
            <td>Nilai </td>
            <td> : </td>
            <td><b> {{ $nilai }} </b></td>
        </tr>
        <tr>
            <td>Metode</td>
            <td> : </td>
            <td> <b>{{ $metode }}</b> </td>
        </tr>
        <tr>
            <td >Bidang</td>
            <td> : </td>
            <td><b>{{ strtoupper($bidang) }} </b></td>
        </tr>
        <tr>
            <td>No Kontrak 1</td>
            <td> : </td>
            <td><b> {{ $nokontrak }}</b> </td>
        </tr>
        <tr>
            <td>Vendor Pemenang 1</td>
            <td> : </td>
            <td><b> {{ $vendor }}</b> </td>
        </tr>
        <tr>
            <td>No Kontrak 2</td>
            <td> : </td>
            <td><b> {{ $nokontrak2 }}</b> </td>
        </tr>
        <tr>
            <td>Vendor Pemenang 2</td>
            <td> : </td>
            <td><b> {{ $vendor2 }}</b> </td>
        </tr>
        <tr>
            <td>No Kontrak 3</td>
            <td> : </td>
            <td><b> {{ $nokontrak3 }}</b> </td>
        </tr>
        <tr>
            <td>Vendor Pemenang 3</td>
            <td> : </td>
            <td><b> {{ $vendor3 }}</b> </td>
        </tr>
    </table>

    <p>Proses pembuatan <b>kontrak KHS sudah selesai</b>, selanjutnya diharapkan untuk segera diproses SPBJ sesuai dengan kontrak dengan memperhatikan aturan/SOP yang berlaku.</p>

    <p>Demikian disampaikan, atas perhatian dan kerja samanya diucapkan terima kasih.</p>

    <a href="http://10.15.35.28/sipadan/"><img src="http://10.15.35.28/sipadan/public/app-assets/img/sipadan3.png" alt="KLIK UNTUK AKSES SIPADAN" style="width:200px;height:50px;"/></a></p></font>

</font>
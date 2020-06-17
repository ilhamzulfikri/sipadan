<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Mail\ProsesPengadaanMail;
use App\Mail\JadwalPengadaanMail;
use App\Mail\InputKontrakMail;
use App\Mail\InputKontrakKHSMail;
use App\Notadinas;
use App\HPE;
use App\ModelHPE;
use App\ModelUser;
use App\ModelVendor;
use App\ModelUnit;

class lakdanControl extends Controller
{

	

	public function rupiah($angka){

        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
        return $hasil_rupiah;
        
    }

    public function daftarProsesPengadaan(){

        $ModelND = ModelHPE::where('proses_pengadaan.selesai','=',NULL)
        ->join('notadinas','hpe.notadinas_id','=','notadinas.id')
        ->leftJoin('proses_pengadaan','proses_pengadaan.hpe_id','=','hpe.id')
        ->select('hpe.no_rks','notadinas.no_notadinas','notadinas.id AS notadinas_id','notadinas.bidang','notadinas.tgl_notadinas','notadinas.pekerjaan','hpe.nilai_hpe','notadinas.lokasi','proses_pengadaan.hpe_id')
        ->orderBy('tgl_notadinas', 'asc')
        ->get();

        $jadwalpengadaan = DB::table('proses_pengadaan')->get();

        return view('lakdan.prosespengadaan-daftar',['notadinas' => $ModelND, 'jadwalpengadaan' => $jadwalpengadaan]);
    }

    public function lihatProsesPengadaan($id){
        $notadinas = Notadinas::where('id', $id)->get(); 
        return view('lakdan.prosespengadaan-lihat',['notadinas' => $notadinas]);
    }

    public function tambahProsesPengadaan(Request $request){

        $emailUser = ModelUser::select('email','nama','jabatan')->where('bidang', $request->bidang)->get();
        $emailLakdan = ModelUser::select('email','nama','jabatan')->where('bidang', 'LAKDAN')->get();
        $emailMup3 = ModelUser::select('email','nama','jabatan')->where('bidang', 'MUP3')->get();
        $emailRen = ModelUser::select('email','nama','jabatan')->where('bidang', 'REN')->get();

        try{

            if($request->cekmetode == 'lelang'){

                DB::table('proses_pengadaan')->insert([
                    'tgl_aw_pengumuman' => $request->tgl_aw_pengumuman,
                    'tgl_ak_pengumuman' => $request->tgl_ak_pengumuman,
                    'tgl_aw_pendaftaran' => $request->tgl_aw_pendaftaran,
                    'tgl_ak_pendaftaran' => $request->tgl_ak_pendaftaran,
                    'tgl_aw_penjelasan' => $request->tgl_aw_penjelasan,
                    'tgl_ak_penjelasan' => $request->tgl_ak_penjelasan,
                    'tgl_aw_upload_penawaran' => $request->tgl_aw_upload_penawaran,
                    'tgl_ak_upload_penawaran' => $request->tgl_ak_upload_penawaran,
                    'tgl_aw_pembukaan_penawaran' => $request->tgl_aw_pembukaan_penawaran,
                    'tgl_ak_pembukaan_penawaran' => $request->tgl_ak_pembukaan_penawaran,
                    'tgl_aw_evaluasi_penawaran' => $request->tgl_aw_evaluasi_penawaran,
                    'tgl_ak_evaluasi_penawaran' => $request->tgl_ak_evaluasi_penawaran,
                    'tgl_aw_evaluasi_dokumen' => $request->tgl_aw_evaluasi_dokumen,
                    'tgl_ak_evaluasi_dokumen' => $request->tgl_ak_evaluasi_dokumen,
                    'tgl_aw_pembuktian_kualifikasi' => $request->tgl_aw_pembuktian_kualifikasi,
                    'tgl_ak_pembuktian_kualifikasi' => $request->tgl_ak_pembuktian_kualifikasi,
                    'tgl_aw_klarifikasi_nego' => $request->tgl_aw_klarifikasi_nego,
                    'tgl_ak_klarifikasi_nego' => $request->tgl_ak_klarifikasi_nego,
                    'tgl_aw_calon_pemenang' => $request->tgl_aw_calon_pemenang,
                    'tgl_ak_calon_pemenang' => $request->tgl_ak_calon_pemenang,
                    'tgl_aw_upload_ba_pengadaan' => $request->tgl_aw_upload_ba_pengadaan,
                    'tgl_ak_upload_ba_pengadaan' => $request->tgl_ak_upload_ba_pengadaan,
                    'tgl_aw_penetapan_pemenang' => $request->tgl_aw_penetapan_pemenang,
                    'tgl_ak_penetapan_pemenang' => $request->tgl_ak_penetapan_pemenang,
                    'tgl_aw_pengumuman_pemenang' => $request->tgl_aw_pengumuman_pemenang,
                    'tgl_ak_pengumuman_pemenang' => $request->tgl_ak_pengumuman_pemenang,
                    'tgl_aw_masa_sanggah' => $request->tgl_aw_masa_sanggah,
                    'tgl_ak_masa_sanggah' => $request->tgl_ak_masa_sanggah,
                    'tgl_aw_surat_penunjukan' => $request->tgl_aw_surat_penunjukan,
                    'tgl_ak_surat_penunjukan' => $request->tgl_ak_surat_penunjukan,
                    'tgl_aw_teken_kontrak' => $request->tgl_aw_teken_kontrak,
                    'tgl_ak_teken_kontrak' => $request->tgl_ak_teken_kontrak,
                    'notadinas_id' => $request->notadinas_id,
                    'hpe_id' => $request->hpe_id,
                    'created_at' => date('Y-m-d H:i:s')
                ]);


                $lihatJadwal = DB::table('proses_pengadaan')->where('notadinas_id', '=', $request->notadinas_id)->get();

                //Mail::to('ilham.zulfikri@pln.co.id')
                Mail::to($emailUser[0]['email'])
                ->cc([$emailMup3[0]['email'],$emailRen[0]['email'],$emailLakdan[0]['email']])
                ->bcc('ilham.zulfikri@pln.co.id')
                ->send(new ProsesPengadaanMail(
                    $request->nonotadinasrks,
                    date("d / m / Y",strtotime($request->tglnotadinasrks)),
                    $this->rupiah($request->nilaihpe),
                    $request->pekerjaan,
                    $request->lokasi,
                    $request->bidang,
                    $emailUser[0]['jabatan'],
                    $request->waktupekerjaan,
                    $request->metode,
                    $request->vendor,
                    $request->sumberdana,
                    $request->noprk,
                    $lihatJadwal
                ));


            }
            else{

              DB::table('proses_pengadaan')->insert([
                  'selesai' => '1',
                  'notadinas_id' => $request->notadinas_id,
                  'hpe_id' => $request->hpe_id,
                  'created_at' => date('Y-m-d H:i:s')
              ]);

            //Mail::to('ilham.zulfikri@pln.co.id')
              Mail::to($emailUser[0]['email'])
              ->cc([$emailMup3[0]['email'],$emailRen[0]['email'],$emailLakdan[0]['email']])
              ->bcc('ilham.zulfikri@pln.co.id')
              ->send(new ProsesPengadaanMail(
                $request->nonotadinasrks,
                date("d / m / Y",strtotime($request->tglnotadinasrks)),
                $this->rupiah($request->nilaihpe),
                $request->pekerjaan,
                $request->lokasi,
                $request->bidang,
                $emailUser[0]['jabatan'],
                $request->waktupekerjaan,
                $request->metode,
                $request->vendor,
                $request->sumberdana,
                $request->noprk,
                NULL
            ));


          }
      }catch(\Illuminate\Database\QueryException $ex){
        return redirect('prosespengadaan')->with('status', 'Gagal Disimpan. '.$ex->getMessage().'.');
    }


    return redirect('prosespengadaan')->with('status', 'Data Berhasil Disimpan.');

} 

public function editProsesPengadaan($id){
    $notadinas = Notadinas::where('id', $id)->get(); 
    return view('lakdan.prosespengadaan-edit',['notadinas' => $notadinas]);
}

public function updateProsesPengadaan(Request $request){   
    $emailUser = ModelUser::select('email','nama','jabatan')->where('bidang', $request->bidang)->get();
    $emailLakdan = ModelUser::select('email','nama','jabatan')->where('bidang', 'LAKDAN')->get();
    $emailMup3 = ModelUser::select('email','nama','jabatan')->where('bidang', 'MUP3')->get();
    $emailRen = ModelUser::select('email','nama','jabatan')->where('bidang', 'REN')->get();

    switch($request->tombolSimpan) {
        case 'Simpan':
        try{


            DB::table('proses_pengadaan')->where('id',$request->prosespengadaan_id)->update([
                'tgl_aw_pengumuman' => $request->tgl_aw_pengumuman,
                'tgl_ak_pengumuman' => $request->tgl_ak_pengumuman,
                'ket_pengumuman' => $request->ket_pengumuman,

                'tgl_aw_pendaftaran' => $request->tgl_aw_pendaftaran,
                'tgl_ak_pendaftaran' => $request->tgl_ak_pendaftaran,
                'ket_pendaftaran' => $request->ket_pendaftaran,

                'tgl_aw_penjelasan' => $request->tgl_aw_penjelasan,
                'tgl_ak_penjelasan' => $request->tgl_ak_penjelasan,
                'ket_penjelasan' => $request->ket_penjelasan,

                'tgl_aw_upload_penawaran' => $request->tgl_aw_upload_penawaran,
                'tgl_ak_upload_penawaran' => $request->tgl_ak_upload_penawaran,
                'ket_upload_penawaran' => $request->ket_upload_penawaran,

                'tgl_aw_pembukaan_penawaran' => $request->tgl_aw_pembukaan_penawaran,
                'tgl_ak_pembukaan_penawaran' => $request->tgl_ak_pembukaan_penawaran,
                'ket_pembukaan_penawaran' => $request->ket_pembukaan_penawaran,

                'tgl_aw_evaluasi_penawaran' => $request->tgl_aw_evaluasi_penawaran,
                'tgl_ak_evaluasi_penawaran' => $request->tgl_ak_evaluasi_penawaran,
                'ket_evaluasi_penawaran' => $request->ket_evaluasi_penawaran,

                'tgl_aw_evaluasi_dokumen' => $request->tgl_aw_evaluasi_dokumen,
                'tgl_ak_evaluasi_dokumen' => $request->tgl_ak_evaluasi_dokumen,
                'ket_evaluasi_dokumen' => $request->ket_evaluasi_dokumen,

                'tgl_aw_pembuktian_kualifikasi' => $request->tgl_aw_pembuktian_kualifikasi,
                'tgl_ak_pembuktian_kualifikasi' => $request->tgl_ak_pembuktian_kualifikasi,
                'ket_pembuktian_kualifikasi' => $request->ket_pembuktian_kualifikasi,

                'tgl_aw_klarifikasi_nego' => $request->tgl_aw_klarifikasi_nego,
                'tgl_ak_klarifikasi_nego' => $request->tgl_ak_klarifikasi_nego,
                'ket_klarifikasi_nego' => $request->ket_klarifikasi_nego,

                'tgl_aw_calon_pemenang' => $request->tgl_aw_calon_pemenang,
                'tgl_ak_calon_pemenang' => $request->tgl_ak_calon_pemenang,
                'ket_calon_pemenang' => $request->ket_calon_pemenang,

                'tgl_aw_upload_ba_pengadaan' => $request->tgl_aw_upload_ba_pengadaan,
                'tgl_ak_upload_ba_pengadaan' => $request->tgl_ak_upload_ba_pengadaan,
                'ket_upload_ba_pengadaan' => $request->ket_upload_ba_pengadaan,

                'tgl_aw_penetapan_pemenang' => $request->tgl_aw_penetapan_pemenang,
                'tgl_ak_penetapan_pemenang' => $request->tgl_ak_penetapan_pemenang,
                'ket_penetapan_pemenang' => $request->ket_penetapan_pemenang,

                'tgl_aw_pengumuman_pemenang' => $request->tgl_aw_pengumuman_pemenang,
                'tgl_ak_pengumuman_pemenang' => $request->tgl_ak_pengumuman_pemenang,
                'ket_pengumuman_pemenang' => $request->ket_pengumuman_pemenang,

                'tgl_aw_masa_sanggah' => $request->tgl_aw_masa_sanggah,
                'tgl_ak_masa_sanggah' => $request->tgl_ak_masa_sanggah,
                'ket_masa_sanggah' => $request->ket_masa_sanggah,

                'tgl_aw_surat_penunjukan' => $request->tgl_aw_surat_penunjukan,
                'tgl_ak_surat_penunjukan' => $request->tgl_ak_surat_penunjukan,
                'ket_surat_penunjukan' => $request->ket_surat_penunjukan,

                'tgl_aw_teken_kontrak' => $request->tgl_aw_teken_kontrak,
                'tgl_ak_teken_kontrak' => $request->tgl_ak_teken_kontrak,
                'ket_teken_kontrak' => $request->ket_teken_kontrak,

                'notadinas_id' => $request->notadinas_id,
                'hpe_id' => $request->hpe_id,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        }catch(\Illuminate\Database\QueryException $ex){
            return redirect('prosespengadaan')->with('status', 'Gagal Disimpan. '.$ex->getMessage().'.');
        }


        $lihatJadwal = DB::table('proses_pengadaan')->where('notadinas_id', '=', $request->notadinas_id)->get();

        //Mail::to('ilham.zulfikri@pln.co.id')
        Mail::to($emailUser[0]['email'])
        ->cc([$emailMup3[0]['email'],$emailLakdan[0]['email']])
        ->bcc('ilham.zulfikri@pln.co.id')
        ->send(new JadwalPengadaanMail(
            $request->nonotadinasrks,
            date("d / m / Y",strtotime($request->tglnotadinasrks)),
            $this->rupiah($request->nilaihpe),
            $request->pekerjaan,
            $request->lokasi,
            $request->bidang,
            $emailUser[0]['jabatan'],
            $request->waktupekerjaan,
            $request->metode,
            $request->vendor,
            $request->sumberdana,
            $request->noprk,
            $request->tombolSimpan,
            'Simpan',
            $lihatJadwal,
            ''));

        break;
        case 'Selesai':
        try{
            DB::table('proses_pengadaan')->where('id',$request->prosespengadaan_id)->update([
                'tgl_aw_pengumuman' => $request->tgl_aw_pengumuman,
                'tgl_ak_pengumuman' => $request->tgl_ak_pengumuman,
                'ket_pengumuman' => $request->ket_pengumuman,

                'tgl_aw_pendaftaran' => $request->tgl_aw_pendaftaran,
                'tgl_ak_pendaftaran' => $request->tgl_ak_pendaftaran,
                'ket_pendaftaran' => $request->ket_pendaftaran,

                'tgl_aw_penjelasan' => $request->tgl_aw_penjelasan,
                'tgl_ak_penjelasan' => $request->tgl_ak_penjelasan,
                'ket_penjelasan' => $request->ket_penjelasan,

                'tgl_aw_upload_penawaran' => $request->tgl_aw_upload_penawaran,
                'tgl_ak_upload_penawaran' => $request->tgl_ak_upload_penawaran,
                'ket_upload_penawaran' => $request->ket_upload_penawaran,

                'tgl_aw_pembukaan_penawaran' => $request->tgl_aw_pembukaan_penawaran,
                'tgl_ak_pembukaan_penawaran' => $request->tgl_ak_pembukaan_penawaran,
                'ket_pembukaan_penawaran' => $request->ket_pembukaan_penawaran,

                'tgl_aw_evaluasi_penawaran' => $request->tgl_aw_evaluasi_penawaran,
                'tgl_ak_evaluasi_penawaran' => $request->tgl_ak_evaluasi_penawaran,
                'ket_evaluasi_penawaran' => $request->ket_evaluasi_penawaran,

                'tgl_aw_evaluasi_dokumen' => $request->tgl_aw_evaluasi_dokumen,
                'tgl_ak_evaluasi_dokumen' => $request->tgl_ak_evaluasi_dokumen,
                'ket_evaluasi_dokumen' => $request->ket_evaluasi_dokumen,

                'tgl_aw_pembuktian_kualifikasi' => $request->tgl_aw_pembuktian_kualifikasi,
                'tgl_ak_pembuktian_kualifikasi' => $request->tgl_ak_pembuktian_kualifikasi,
                'ket_pembuktian_kualifikasi' => $request->ket_pembuktian_kualifikasi,

                'tgl_aw_klarifikasi_nego' => $request->tgl_aw_klarifikasi_nego,
                'tgl_ak_klarifikasi_nego' => $request->tgl_ak_klarifikasi_nego,
                'ket_klarifikasi_nego' => $request->ket_klarifikasi_nego,

                'tgl_aw_calon_pemenang' => $request->tgl_aw_calon_pemenang,
                'tgl_ak_calon_pemenang' => $request->tgl_ak_calon_pemenang,
                'ket_calon_pemenang' => $request->ket_calon_pemenang,

                'tgl_aw_upload_ba_pengadaan' => $request->tgl_aw_upload_ba_pengadaan,
                'tgl_ak_upload_ba_pengadaan' => $request->tgl_ak_upload_ba_pengadaan,
                'ket_upload_ba_pengadaan' => $request->ket_upload_ba_pengadaan,

                'tgl_aw_penetapan_pemenang' => $request->tgl_aw_penetapan_pemenang,
                'tgl_ak_penetapan_pemenang' => $request->tgl_ak_penetapan_pemenang,
                'ket_penetapan_pemenang' => $request->ket_penetapan_pemenang,

                'tgl_aw_pengumuman_pemenang' => $request->tgl_aw_pengumuman_pemenang,
                'tgl_ak_pengumuman_pemenang' => $request->tgl_ak_pengumuman_pemenang,
                'ket_pengumuman_pemenang' => $request->ket_pengumuman_pemenang,

                'tgl_aw_masa_sanggah' => $request->tgl_aw_masa_sanggah,
                'tgl_ak_masa_sanggah' => $request->tgl_ak_masa_sanggah,
                'ket_masa_sanggah' => $request->ket_masa_sanggah,

                'tgl_aw_surat_penunjukan' => $request->tgl_aw_surat_penunjukan,
                'tgl_ak_surat_penunjukan' => $request->tgl_ak_surat_penunjukan,
                'ket_surat_penunjukan' => $request->ket_surat_penunjukan,

                'tgl_aw_teken_kontrak' => $request->tgl_aw_teken_kontrak,
                'tgl_ak_teken_kontrak' => $request->tgl_ak_teken_kontrak,
                'ket_teken_kontrak' => $request->ket_teken_kontrak,

                'selesai' => '1',
                'notadinas_id' => $request->notadinas_id,
                'hpe_id' => $request->hpe_id,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }catch(\Illuminate\Database\QueryException $ex){
            return redirect('prosespengadaan')->with('status', 'Gagal Disimpan. '.$ex->getMessage().'.');
        }

        //Mail::to('ilham.zulfikri@pln.co.id')
        Mail::to($emailUser[0]['email'])
        ->cc([$emailMup3[0]['email'],$emailLakdan[0]['email']])
        ->bcc('ilham.zulfikri@pln.co.id')
        ->send(new JadwalPengadaanMail(
            $request->nonotadinasrks,
            date("d / m / Y",strtotime($request->tglnotadinasrks)),
            $this->rupiah($request->nilaihpe),
            $request->pekerjaan,
            $request->lokasi,
            $request->bidang,
            $emailUser[0]['jabatan'],
            $request->waktupekerjaan,
            $request->metode,
            $request->vendor,
            $request->sumberdana,
            $request->noprk,
            $request->tombolSimpan,
            $request->ket_gagal,
            'Selesai',
            $request->tindakan
        ));

        break;
        case 'Gagal':
        //Mail::to('ilham.zulfikri@pln.co.id')
        Mail::to($emailUser[0]['email'])
        ->cc([$emailMup3[0]['email'],$emailLakdan[0]['email'],$emailRen[0]['email']])
        ->bcc('ilham.zulfikri@pln.co.id')
        ->send(new JadwalPengadaanMail(
            $request->nonotadinasrks,
            date("d / m / Y",strtotime($request->tglnotadinasrks)),
            $this->rupiah($request->nilaihpe),
            $request->pekerjaan,
            $request->lokasi,
            $request->bidang,
            $emailUser[0]['jabatan'],
            $request->waktupekerjaan,
            $request->metode,
            $request->vendor,
            $request->sumberdana,
            $request->noprk,
            $request->tombolSimpan,
            $request->ket_gagal,
            '',
            $request->tindakan
        ));

        break;
    }

    return redirect('prosespengadaan')->with('status', 'Data Berhasil Disimpan.');
}

public function daftarKontrak(){
    $notadinas = Notadinas::where([['proses_pengadaan.selesai','=','1'],['upload_pakta','=',NULL]])
    ->join('hpe','hpe.notadinas_id','=','notadinas.id')
    ->join('proses_pengadaan','proses_pengadaan.notadinas_id','=','notadinas.id')
    ->leftJoin('kontrak','kontrak.notadinas_id','=','notadinas.id')
    ->select('hpe.no_rks','notadinas.no_notadinas','notadinas.id AS notadinas_id','notadinas.bidang','notadinas.tgl_notadinas','notadinas.pekerjaan','hpe.nilai_hpe','hpe.khs','notadinas.lokasi','proses_pengadaan.hpe_id')
    ->get();
    return view('lakdan.inputkontrak-daftar',['notadinas' => $notadinas]);
}

public function lihatKontrak($id){
    $notadinas = Notadinas::where('id', $id)->get();
    $vendor = DB::table('vendor')->orderBy('nama','ASC')->get();
    $unit = DB::table('unit')->where('upi',Session::get('upi'))->orderBy('kode','ASC')->get();
    return view('lakdan.inputkontrak-lihat',['notadinas' => $notadinas, 'vendor' => $vendor, 'unit' => $unit ]);
}

public function tambahKontrak(Request $request){

    $vendor_pemenang = null;
    $vendor_pemenang2 = null; 
    $vendor_pemenang3 = null; 
    $emalulp = null;
    $tujuan_upload = 'upload';

    if($request->unit == NULL){
        $unit = null;
    }
    else{
        $unit = implode(',',$request->unit);
    }


    $upload_cover = $request->file('upload_cover');
    $nama_upload_cover = time()."_".$upload_cover->getClientOriginalName();
    $upload_cover->move($tujuan_upload,$nama_upload_cover);

    $upload_surat = $request->file('upload_surat');
    $nama_upload_surat = time()."_".$upload_surat->getClientOriginalName();
    $upload_surat->move($tujuan_upload,$nama_upload_surat);

    $upload_lampiran = $request->file('upload_lampiran');
    $nama_upload_lampiran = time()."_".$upload_lampiran->getClientOriginalName();
    $upload_lampiran->move($tujuan_upload,$nama_upload_lampiran);

    $upload_proses = $request->file('upload_proses');
    $nama_upload_proses = time()."_".$upload_proses->getClientOriginalName();
    $upload_proses->move($tujuan_upload,$nama_upload_proses);

    $upload_penawaran = $request->file('upload_penawaran');
    $nama_upload_penawaran = time()."_".$upload_penawaran->getClientOriginalName();
    $upload_penawaran->move($tujuan_upload,$nama_upload_penawaran);

    $upload_pakta = $request->file('upload_pakta');
    $nama_upload_pakta = time()."_".$upload_pakta->getClientOriginalName();
    $upload_pakta->move($tujuan_upload,$nama_upload_pakta);

    $upload_hps = $request->file('upload_hps');
    $nama_upload_hps = time()."_".$upload_hps->getClientOriginalName();
    $upload_hps->move($tujuan_upload,$nama_upload_hps);

    $upload_cover = $tujuan_upload."/".$nama_upload_cover;
    $upload_surat = $tujuan_upload."/".$nama_upload_surat;
    $upload_lampiran = $tujuan_upload."/".$nama_upload_lampiran;
    $upload_proses = $tujuan_upload."/".$nama_upload_proses;
    $upload_penawaran = $tujuan_upload."/".$nama_upload_penawaran;
    $upload_pakta = $tujuan_upload."/".$nama_upload_pakta;
    $upload_hps = $tujuan_upload."/".$nama_upload_hps;

    try{

        DB::table('kontrak')->insert([
            'no_kontrak' => $request->no_kontrak,
            'tgl_mulai_kontrak' => $request->tgl_mulai_kontrak,
            'tgl_akhir_kontrak' => $request->tgl_akhir_kontrak,
            'nilai_kontrak' => $request->nilai_kontrak,
            'vendor_pemenang' => $request->pilihvendor,
            'unit' => $unit,
            'upload_cover' => $upload_cover,
            'upload_surat' => $upload_surat,
            'upload_lampiran' => $upload_lampiran,
            'upload_proses' => $upload_proses,
            'upload_penawaran' => $upload_penawaran,
            'upload_pakta' => $upload_pakta,
            'upload_hps' => $upload_hps,
            'notadinas_id' => $request->notadinas_id,
            'hpe_id' => $request->hpe_id,
            'proses_pengadaan_id' => $request->proses_pengadaan_id,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }catch(\Illuminate\Database\QueryException $ex){
        return redirect('inputkontrak')->with('status', 'Gagal Disimpan. '.$ex->getMessage().'.');
    }


        //PEMENANG 2

    if($request->no_kontrak2 != NULL){
        $upload_cover = $request->file('upload_cover2');
        $nama_upload_cover = time()."_".$upload_cover->getClientOriginalName();
        $upload_cover->move($tujuan_upload,$nama_upload_cover);

        $upload_surat = $request->file('upload_surat2');
        $nama_upload_surat = time()."_".$upload_surat->getClientOriginalName();
        $upload_surat->move($tujuan_upload,$nama_upload_surat);

        $upload_lampiran = $request->file('upload_lampiran2');
        $nama_upload_lampiran = time()."_".$upload_lampiran->getClientOriginalName();
        $upload_lampiran->move($tujuan_upload,$nama_upload_lampiran);

        $upload_proses = $request->file('upload_proses2');
        $nama_upload_proses = time()."_".$upload_proses->getClientOriginalName();
        $upload_proses->move($tujuan_upload,$nama_upload_proses);

        $upload_penawaran = $request->file('upload_penawaran2');
        $nama_upload_penawaran = time()."_".$upload_penawaran->getClientOriginalName();
        $upload_penawaran->move($tujuan_upload,$nama_upload_penawaran);

        $upload_pakta = $request->file('upload_pakta2');
        $nama_upload_pakta = time()."_".$upload_pakta->getClientOriginalName();
        $upload_pakta->move($tujuan_upload,$nama_upload_pakta);

        $upload_hps = $request->file('upload_hps2');
        $nama_upload_hps = time()."_".$upload_hps->getClientOriginalName();
        $upload_hps->move($tujuan_upload,$nama_upload_hps);

        $upload_cover = $tujuan_upload."/".$nama_upload_cover;
        $upload_surat = $tujuan_upload."/".$nama_upload_surat;
        $upload_lampiran = $tujuan_upload."/".$nama_upload_lampiran;
        $upload_proses = $tujuan_upload."/".$nama_upload_proses;
        $upload_penawaran = $tujuan_upload."/".$nama_upload_penawaran;
        $upload_pakta = $tujuan_upload."/".$nama_upload_pakta;
        $upload_hps = $tujuan_upload."/".$nama_upload_hps;

        try{

            DB::table('kontrak')->insert([
                'no_kontrak' => $request->no_kontrak2,
                'tgl_mulai_kontrak' => $request->tgl_mulai_kontrak,
                'tgl_akhir_kontrak' => $request->tgl_akhir_kontrak,
                'nilai_kontrak' => $request->nilai_kontrak,
                'vendor_pemenang' => $request->pilihvendor2,
                'unit' => $unit,
                'upload_cover' => $upload_cover,
                'upload_surat' => $upload_surat,
                'upload_lampiran' => $upload_lampiran,
                'upload_proses' => $upload_proses,
                'upload_penawaran' => $upload_penawaran,
                'upload_pakta' => $upload_pakta,
                'upload_hps' => $upload_hps,
                'notadinas_id' => $request->notadinas_id,
                'hpe_id' => $request->hpe_id,
                'proses_pengadaan_id' => $request->proses_pengadaan_id,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }catch(\Illuminate\Database\QueryException $ex){
            return redirect('inputkontrak')->with('status', 'Gagal Disimpan. '.$ex->getMessage().'.');
        }
    }
        //AKHIR PMENANG 2


        //PEMENANG 3
    if($request->no_kontrak3 != NULL){

        $upload_cover = $request->file('upload_cover3');
        $nama_upload_cover = time()."_".$upload_cover->getClientOriginalName();
        $upload_cover->move($tujuan_upload,$nama_upload_cover);

        $upload_surat = $request->file('upload_surat3');
        $nama_upload_surat = time()."_".$upload_surat->getClientOriginalName();
        $upload_surat->move($tujuan_upload,$nama_upload_surat);

        $upload_lampiran = $request->file('upload_lampiran3');
        $nama_upload_lampiran = time()."_".$upload_lampiran->getClientOriginalName();
        $upload_lampiran->move($tujuan_upload,$nama_upload_lampiran);

        $upload_proses = $request->file('upload_proses3');
        $nama_upload_proses = time()."_".$upload_proses->getClientOriginalName();
        $upload_proses->move($tujuan_upload,$nama_upload_proses);

        $upload_penawaran = $request->file('upload_penawaran3');
        $nama_upload_penawaran = time()."_".$upload_penawaran->getClientOriginalName();
        $upload_penawaran->move($tujuan_upload,$nama_upload_penawaran);

        $upload_pakta = $request->file('upload_pakta3');
        $nama_upload_pakta = time()."_".$upload_pakta->getClientOriginalName();
        $upload_pakta->move($tujuan_upload,$nama_upload_pakta);

        $upload_hps = $request->file('upload_hps3');
        $nama_upload_hps = time()."_".$upload_hps->getClientOriginalName();
        $upload_hps->move($tujuan_upload,$nama_upload_hps);


        $upload_cover = $tujuan_upload."/".$nama_upload_cover;
        $upload_surat = $tujuan_upload."/".$nama_upload_surat;
        $upload_lampiran = $tujuan_upload."/".$nama_upload_lampiran;
        $upload_proses = $tujuan_upload."/".$nama_upload_proses;
        $upload_penawaran = $tujuan_upload."/".$nama_upload_penawaran;
        $upload_pakta = $tujuan_upload."/".$nama_upload_pakta;
        $upload_hps = $tujuan_upload."/".$nama_upload_hps;

        try{

            DB::table('kontrak')->insert([
                'no_kontrak' => $request->no_kontrak3,
                'tgl_mulai_kontrak' => $request->tgl_mulai_kontrak,
                'tgl_akhir_kontrak' => $request->tgl_akhir_kontrak,
                'nilai_kontrak' => $request->nilai_kontrak,
                'vendor_pemenang' => $request->pilihvendor3,
                'unit' => $unit,
                'upload_cover' => $upload_cover,
                'upload_surat' => $upload_surat,
                'upload_lampiran' => $upload_lampiran,
                'upload_proses' => $upload_proses,
                'upload_penawaran' => $upload_penawaran,
                'upload_pakta' => $upload_pakta,
                'upload_hps' => $upload_hps,
                'notadinas_id' => $request->notadinas_id,
                'hpe_id' => $request->hpe_id,
                'proses_pengadaan_id' => $request->proses_pengadaan_id,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }catch(\Illuminate\Database\QueryException $ex){
            return redirect('inputkontrak')->with('status', 'Gagal Disimpan. '.$ex->getMessage().'.');
        }
    }
        //AKHIR PMENANG 3




    $emailUser = ModelUser::select('email','nama','jabatan')->where('bidang', $request->bidang)->get();
    $emailLakdan = ModelUser::select('email','nama','jabatan')->where('bidang', 'LAKDAN')->get();
    $emailMup3 = ModelUser::select('email','nama','jabatan')->where('bidang', 'MUP3')->get();
    $emailVendor = ModelVendor::select('email','nama')->where('nama', $request->pilihvendor)->get();
    $emailRen = ModelUser::select('email','nama','jabatan')->where('bidang', 'REN')->get();

    if($request->unit != NULL){
       $emailkhsulp = ModelUser::select('email','nama','jabatan')->whereIN('up', $request->unit)->get();
   }

   if($request->khs == "1")
   {
    //Mail::to('ilham.zulfikri@pln.co.id')
    Mail::to($emailUser[0]['email'])
    ->cc([$emailMup3[0]['email'],$emailLakdan[0]['email'],$emailRen[0]['email']])
    ->bcc('ilham.zulfikri@pln.co.id')
    ->send(new InputKontrakKHSMail(
        $request->pekerjaan,
        date("d / m / Y",strtotime($request->tgl_mulai_kontrak)),
        date("d / m / Y",strtotime($request->tgl_akhir_kontrak)),
        $request->lokasi,
        $request->sumberdana,
        $request->noprk,
        $this->rupiah($request->nilai_kontrak),
        $request->metode,
        $request->bidang,
        $request->no_kontrak,
        $request->pilihvendor,
        $request->no_kontrak2,
        $request->pilihvendor2,
        $request->no_kontrak3,
        $request->pilihvendor3,
        $emailUser[0]['jabatan']
    ));
}else{
    //Mail::to('ilham.zulfikri@pln.co.id')
    Mail::to($emailVendor[0]['email'])
    ->cc([$emailMup3[0]['email'],$emailUser[0]['email'],$emailLakdan[0]['email'],$emailRen[0]['email']])
    ->send(new InputKontrakMail(
        $request->no_kontrak,
        date("d / m / Y",strtotime($request->tgl_mulai_kontrak)),
        $this->rupiah($request->nilai_kontrak),
        $request->pekerjaan,
        $request->lokasi,
        $request->bidang,
        $emailVendor[0]['nama'],
        date("d / m / Y",strtotime($request->tgl_akhir_kontrak)),
        $request->metode,
        $request->pilihvendor,
        $request->sumberdana,
        $request->noprk
    )); 
}          

return redirect('inputkontrak')->with('status','Data Berhasil Disimpan.');

}

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Mail\IamMail;
use App\Mail\HPEMail;
use App\Mail\JadwalMail;
use App\Mail\KontrakMail;
use App\Mail\GagalMail;
use App\ModelUser;
use App\Notadinas;
use App\HPE;
use App\ModelND;
use App\ModelHPE;
use App\ModelVendor;


class IamController extends Controller
{    
    public function beranda(){
      return view('beranda');
  }

  public function hpemail(){
    return view('mail');
}

public function notadinas(){
  return view('notadinas');
}

public function addendum(){
  return view('addendum');
}

public function rupiah($angka){
    
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
    return $hasil_rupiah;
    
}

public function prosespengadaan(){
        //$notadinas = Notadinas::where('vendor', '90' )->get();
        /*$notadinas = DB::table('notadinas')
        ->join('hpe', 'hpe.notadinas_id', '=', 'notadinas.id')
        ->where('hpe.vendor', '=', NULL)
        ->get();
        */

        //$ModelND = ModelND::all();
        $ModelND = ModelHPE::where('proses_pengadaan.selesai','=',NULL)
        ->join('notadinas','hpe.notadinas_id','=','notadinas.id')
        ->leftJoin('proses_pengadaan','proses_pengadaan.hpe_id','=','hpe.id')
        ->select('hpe.no_rks','notadinas.no_notadinas','notadinas.id AS notadinas_id','notadinas.bidang','notadinas.tgl_notadinas','notadinas.pekerjaan','hpe.nilai_hpe','notadinas.lokasi','proses_pengadaan.hpe_id')
        ->get();

        $jadwalpengadaan = DB::table('proses_pengadaan')->get();

        return view('prosespengadaan',['notadinas' => $ModelND, 'jadwalpengadaan' => $jadwalpengadaan]);
    }

    public function daftarpengadaan($id){
        $notadinas = Notadinas::where('id', $id)->get(); 
        return view('daftarpengadaan',['notadinas' => $notadinas]);
    }

    public function jadwalpengadaan($id){
        $notadinas = Notadinas::where('id', $id)->get(); 
        return view('jadwalpengadaan',['notadinas' => $notadinas]);
    }

    public function editjadwalpengadaan($id){
        $notadinas = Notadinas::where('id', $id)->get(); 
        //$jadwalpengadaan = DB::table('proses_pengadaan')->where('notadinas_id',$id)->get();

        return view('editjadwalpengadaan',['notadinas' => $notadinas]);
    }


    public function inputkontrak(){
		//$notadinas = Notadinas::where('selesai','=','1')
        $notadinas = Notadinas::where([['proses_pengadaan.selesai','=','1'],['upload_pakta','=',NULL]])
        ->join('hpe','hpe.notadinas_id','=','notadinas.id')
        ->join('proses_pengadaan','proses_pengadaan.notadinas_id','=','notadinas.id')
        ->leftJoin('kontrak','kontrak.notadinas_id','=','notadinas.id')
        ->select('hpe.no_rks','notadinas.no_notadinas','notadinas.id AS notadinas_id','notadinas.bidang','notadinas.tgl_notadinas','notadinas.pekerjaan','hpe.nilai_hpe','notadinas.lokasi','proses_pengadaan.hpe_id')
        ->get();
        return view('inputkontrak',['notadinas' => $notadinas]);
    }

    public function datakontrak($id){
        $notadinas = Notadinas::where('id', $id)->get();
        $vendor = DB::table('vendor')->get();
        return view('datakontrak',['notadinas' => $notadinas, 'vendor' => $vendor]);
    }

    public function hpe(){
		// mengambil data dari tabel notadinas
		//$notadinas = DB::table('notadinas')->get();
		// mengirim data notadinas ke view hpe
        $notadinas = Notadinas::all();
        return view('hpe',['notadinas' => $notadinas]);
    }

    public function hpedaftar($id){
        // mengambil data dari tabel notadinas
        $notadinas = DB::table('notadinas')->where('id',$id)->get();
        $vendor = DB::table('vendor')->get();
        // mengirim data notadinas ke view hpe
        return view('hpedaftar',['notadinas' => $notadinas, 'vendor' => $vendor]);
    }

    public function tentang(){
      return view('tentang');
  }

  public function user(){
		// mengambil data dari tabel notadinas
      $users = DB::table('users')->get();
		// mengirim data notadinas ke view hpe
      return view('user',['users' => $users]);
  }

  public function kontak(){
   $ModelND = ModelHPE::where('proses_pengadaan.selesai','=',NULL)
   ->join('notadinas','hpe.notadinas_id','=','notadinas.id')
   ->leftJoin('proses_pengadaan','proses_pengadaan.hpe_id','=','hpe.id')->get();

   $jadwalpengadaan = DB::table('proses_pengadaan')->get();

   return view('kontak',['notadinas' => $ModelND, 'jadwalpengadaan' => $jadwalpengadaan]);
}

public function versi(){
  return view('versi');
}

public function maintenis(){
  return view('maintenis');
}

	//FUNGSI DATABASE
public function tambahnotadinas(Request $request)
{	
    function rupiah($angka){
        
        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
        return $hasil_rupiah;
        
    }


    $file_notadinas = $request->file('uploadnotadinas');
    $nama_uploadnotadinas = time()."_".$file_notadinas->getClientOriginalName();
    $tujuan_uploadnotadinas = 'upload';
    $file_notadinas->move($tujuan_uploadnotadinas,$nama_uploadnotadinas);

    $file_rab = $request->file('uploadrab');
    $nama_uploadrab = time()."_".$file_rab->getClientOriginalName();
    $tujuan_uploadrab = 'upload';
    $file_rab->move($tujuan_uploadrab,$nama_uploadrab);

    if($request->uploadjustifikasi){
    	$file_justifikasi = $request->file('uploadjustifikasi');
    	$nama_uploadjustifikasi = time()."_".$file_justifikasi->getClientOriginalName();
    	$tujuan_uploadjustifikasi = 'upload';
    	$file_justifikasi->move($tujuan_uploadjustifikasi,$nama_uploadjustifikasi);
    	$uploadjustifikasi = $tujuan_uploadjustifikasi."/".$nama_uploadjustifikasi;
    }else{
    	$uploadjustifikasi = NULL;
    }

    $uploadnotadinas = $tujuan_uploadnotadinas."/".$nama_uploadnotadinas;
    $uploadrab = $tujuan_uploadrab."/".$nama_uploadrab;

    

    try{

        DB::table('notadinas')->insert([
        	'upi' => Session::get('upi'),
        	'ap' => Session::get('ap'),
        	'no_notadinas' => $request->nonotadinas,
        	'tgl_notadinas' => $request->tlgnotadinas,
        	'pekerjaan' => $request->pekerjaan,
        	'sumber_dana' => $request->sumberdana,
        	'nilai_rab' => $request->nilairab,
        	'no_prk' => $request->noprk,
        	'lokasi' => $request->lokasi,
        	'upload_notadinas' => $uploadnotadinas,
        	'upload_rab' => $uploadrab,
        	'upload_justifikasi' => $uploadjustifikasi,
        	'user' => Session::get('nama'),
        	'bidang' => Session::get('bidang'),
        	'created_at' => date('Y-m-d H:i:s')
        ]);
    }catch(\Illuminate\Database\QueryException $ex){
        return redirect('notadinas')->with('status', 'Gagal Disimpan. '.$ex->getMessage().'.');
    }
    

    $emailUser = ModelUser::select('email','nama','jabatan')->where('bidang', Session::get('bidang'))->get();
    $emailRen = ModelUser::select('email','nama','jabatan')->where('bidang', 'REN')->get();
    $emailMup3 = ModelUser::select('email','nama','jabatan')->where('bidang', 'MUP3')->get();
    
         /*
        Mail::to($emailRen[0]['email'])
        ->cc([$emailMup3[0]['email'],$emailUser[0]['email']])
        ->bcc('ilham.zulfikri@pln.co.id')
        ->send(new IamMail(
        	$request->nonotadinas,
            date("d / m / Y",strtotime($request->tlgnotadinas)),
        	rupiah($request->nilairab),
        	$request->pekerjaan,
        	$request->lokasi,
        	Session::get('bidang'),
        	$emailRen[0]['jabatan'],
            $request->sumberdana,
            $request->noprk
    ));
    */
    /*

    Mail::to('ilham.zulfikri@pln.co.id')
        ->send(new IamMail(
            $request->nonotadinas,
            date("d / m / Y",strtotime($request->tlgnotadinas)),
            rupiah($request->nilairab),
            $request->pekerjaan,
            $request->lokasi,
            Session::get('bidang'),
            $emailRen[0]['jabatan'],
            $request->sumberdana,
            $request->noprk
    ));
    */
    

    return redirect('notadinas')->with('status', 'Nota Dinas Dengan No. '.$request->nonotadinas.' Berhasil Disimpan.');


}

public function loginPost(Request $request){

    $user = $request->user;
    $password = $request->password;

    $data = ModelUser::where('user',$user)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
            	Session::put('upi',$data->upi);
                Session::put('ap',$data->ap);
                Session::put('user',$data->user);
                Session::put('email',$data->email);
                Session::put('nama',$data->nama);
                Session::put('bidang',$data->bidang);
                Session::put('login',TRUE);
                return redirect('beranda');
            }
            else{
                return redirect('login')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('login')->with('alert','Password atau Email, Salah !');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }

    public function datahpe(){
        $notadinas = Notadinas::all();
    }


    public function tambahhpe(Request $request)
    {   

        $file_nd_mup3 = $request->file('upload_nd_mup3');
        $nama_upload_nd_mup3 = time()."_".$file_nd_mup3->getClientOriginalName();
        $tujuan_upload_nd_mup3= 'upload';
        $file_nd_mup3->move($tujuan_upload_nd_mup3,$nama_upload_nd_mup3);

        $file_hpe = $request->file('uploadhpe');
        $nama_uploadhpe = time()."_".$file_hpe->getClientOriginalName();
        $tujuan_uploadhpe = 'upload';
        $file_hpe->move($tujuan_uploadhpe,$nama_uploadhpe);

        $file_rks = $request->file('uploadrks');
        $nama_uploadrks = time()."_".$file_rks->getClientOriginalName();
        $tujuan_uploadrks = 'upload';
        $file_rks->move($tujuan_uploadrks,$nama_uploadrks);

        $upload_nd_mup3 = $tujuan_upload_nd_mup3."/".$nama_upload_nd_mup3;
        $uploadhpe = $tujuan_uploadhpe."/".$nama_uploadhpe;
        $uploadrks = $tujuan_uploadrks."/".$nama_uploadrks;

        function rupiah($angka){
            
            $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
            return $hasil_rupiah;
            
        }

        

        try{

            DB::table('hpe')->insert([
                'no_notaman' => $request->nonotadinasrks,
                'tgl_notaman' => $request->tglnotadinasrks,
                'no_rks' => $request->norks,
                'tgl_rks' => $request->tglrks,
                'nilai_hpe' => $request->nilaihpe,
                'waktu' => $request->waktupekerjaan,
                'metode' => $request->metode,
                'vendor' => $request->vendor,
                'upload_nd_mup3' => $upload_nd_mup3,
                'upload_hpe' => $uploadhpe,
                'upload_rks' => $uploadrks,
                'notadinas_id' => $request->notadinas_id,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }catch(\Illuminate\Database\QueryException $ex){
            return redirect('hpe')->with('status', 'Gagal Disimpan. '.$ex->getMessage().'.');
        }

        $emailUser = ModelUser::select('email','nama','jabatan')->where('bidang', $request->bidang)->get();
        $emailRen = ModelUser::select('email','nama','jabatan')->where('bidang', 'REN')->get();
        $emailLakdan = ModelUser::select('email','nama','jabatan')->where('bidang', 'LAKDAN')->get();
        $emailMup3 = ModelUser::select('email','nama','jabatan')->where('bidang', 'MUP3')->get();

        /*
        
        Mail::to($emailLakdan[0]['email'])
        ->cc([$emailMup3[0]['email'],$emailRen[0]['email'],$emailUser[0]['email']])
        ->bcc('ilham.zulfikri@pln.co.id')
        ->send(new HPEMail(
            $request->nonotadinasrks,
            date("d / m / Y",strtotime($request->tglnotadinasrks)),
            rupiah($request->nilaihpe),
            $request->pekerjaan,
            $request->lokasi,
            $request->bidang,
            $emailLakdan[0]['jabatan'],
            $request->waktupekerjaan,
            $request->metode,
            $request->vendor,
            $request->sumberdana,
            $request->noprk
        ));
        */
        

        return redirect('hpe')->with('status', 'RKS Dengan No. '.$request->norks.' Berhasil Disimpan.');

    }

    public function tambahjadwalpengadaan(Request $request)
    {   
        $emailUser = ModelUser::select('email','nama')->where('bidang', $request->bidang)->get();
        $emailLakdan = ModelUser::select('email','nama')->where('bidang', 'LAKDAN')->get();
        $emailMup3 = ModelUser::select('email','nama')->where('bidang', 'MUP3')->get();

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

                Mail::to('ilham.zulfikri@pln.co.id')
                ->send(new JadwalMail(
                    $request->nonotadinasrks,
                    date("d / m / Y",strtotime($request->tglnotadinasrks)),
                    $this->rupiah($request->nilaihpe),
                    $request->pekerjaan,
                    $request->lokasi,
                    $request->bidang,
                    'ilahm',
                    $request->waktupekerjaan,
                    $request->metode,
                    $request->vendor,
                    $request->sumberdana,
                    $request->noprk,
                    $request->tombolSimpan,
                    'Simpan',
                    $lihatJadwal,
                    ''));

            }else{
            /*
            DB::table('proses_pengadaan')->insert([
                'selesai' => '1',
                'notadinas_id' => $request->notadinas_id,
                'hpe_id' => $request->hpe_id,
                'created_at' => date('Y-m-d H:i:s')
            ]);
            */

            $emailUser = ModelUser::select('email','nama','jabatan')->where('bidang', $request->bidang)->get();
            $emailLakdan = ModelUser::select('email','nama','jabatan')->where('bidang', 'LAKDAN')->get();
            $emailMup3 = ModelUser::select('email','nama','jabatan')->where('bidang', 'MUP3')->get();
            $emailRen = ModelUser::select('email','nama','jabatan')->where('bidang', 'REN')->get();

            Mail::to('ilham.zulfikri@pln.co.id')
            ->send(new JadwalMail(
                $request->nonotadinasrks,
                date("d / m / Y",strtotime($request->tglnotadinasrks)),
                $this->rupiah($request->nilaihpe),
                $request->pekerjaan,
                $request->lokasi,
                $request->bidang,
                'SPBV TERE',
                $request->waktupekerjaan,
                $request->metode,
                $request->vendor,
                $request->sumberdana,
                $request->noprk,
                $request->tombolSimpan,
                NULL,
                NULL,
                NULL));

        }
    }catch(\Illuminate\Database\QueryException $ex){
        return redirect('prosespengadaan')->with('status', 'Gagal Disimpan. '.$ex->getMessage().'.');
    }
    
    

        /*
        Mail::to($emailLakdan[0]['email'])
        ->cc([$emailMup3[0]['email'],$emailUser[0]['email']])
        ->bcc('ilham.zulfikri@pln.co.id')
        ->send(new IamMail(
            $request->norks,
            $request->tglrks,
            rupiah($request->nilaihpe),
            $request->metode,
            $request->vendor,
            Session::get('bidang'),
            $emailLakdan[0]['nama']));
        */

            return redirect('prosespengadaan')->with('status', 'Data Berhasil Disimpan.');


        }

        public function updatejadwalpengadaan(Request $request)
        {   
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

$lihatJadwal = DB::table('proses_pengadaan')->where('notadinas_id', '=', $request->notadinas_id)->get();


Mail::to('ilham.zulfikri@pln.co.id')
->send(new JadwalMail(
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

}catch(\Illuminate\Database\QueryException $ex){
    return redirect('prosespengadaan')->with('status', 'Gagal Disimpan. '.$ex->getMessage().'.');
}
                        /*
                        Mail::to($emailUser[0]['email'])
                        ->cc([$emailMup3[0]['email'],$emailLakdan[0]['email']])
                        ->bcc('ilham.zulfikri@pln.co.id')
                        ->send(new JadwalMail(
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
                            'Simpan'
                        ));
                        */

                        $lihatJadwal = DB::table('proses_pengadaan')->where('notadinas_id', '=', $request->notadinas_id)->get();

                        Mail::to('ilham.zulfikri@pln.co.id')
                        ->send(new JadwalMail(
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
                        /*
                        Mail::to($emailUser[0]['email'])
                        ->cc([$emailMup3[0]['email'],$emailLakdan[0]['email']])
                        ->bcc('ilham.zulfikri@pln.co.id')
                        ->send(new JadwalMail(
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
                            'Selesai',
                            $request->tindakan
                        ));
                        */
                        Mail::to('ilham.zulfikri@pln.co.id')
                        ->send(new JadwalMail(
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
                /*
                        Mail::to($emailUser[0]['email'])
                        ->cc([$emailMup3[0]['email'],$emailLakdan[0]['email'],$emailRen[0]['email']])
                        ->bcc('ilham.zulfikri@pln.co.id')
                        ->send(new JadwalMail(
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
                        
                    */
                        

                        Mail::to('ilham.zulfikri@pln.co.id')
                        ->send(new JadwalMail(
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

                public function tambahkontrak(Request $request)
                {   

                    $tujuan_upload = 'upload';

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
                        return redirect('hpe')->with('status', 'Gagal Disimpan. '.$ex->getMessage().'.');
                    }
                    

                    $emailUser = ModelUser::select('email','nama','jabatan')->where('bidang', $request->bidang)->get();
                    $emailLakdan = ModelUser::select('email','nama','jabatan')->where('bidang', 'LAKDAN')->get();
                    $emailMup3 = ModelUser::select('email','nama','jabatan')->where('bidang', 'MUP3')->get();
                    $emailVendor = ModelVendor::select('email','nama')->where('nama', $request->pilihvendor)->get();
        /*
          
        Mail::to($emailUser[0]['email'])
        ->cc([$emailMup3[0]['email'],$emailLakdan[0]['email']])
        ->send(new KontrakMail(
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
        */


        return redirect('inputkontrak')->with('status', 'Kontrak Dengan No. '.$request->no_kontrak.' Berhasil Disimpan.');

    }



    public function monitoring(){
        /*
        $notadinas = Notadinas::where('selesai','=','1')
        ->join('hpe','hpe.notadinas_id','=','notadinas.id')
        ->join('proses_pengadaan','proses_pengadaan.notadinas_id','=','notadinas.id')
        ->get();
        */
        $notadinas = Notadinas::all();
        return view('monitoring',['notadinas' => $notadinas]);
    }




    public function monitoringpekerjaan($id){
        $notadinas = Notadinas::where('id', $id)->get();
        $vendor = DB::table('vendor')->get();
        return view('monitoringpekerjaan',['notadinas' => $notadinas, 'vendor' => $vendor]);
    }



}

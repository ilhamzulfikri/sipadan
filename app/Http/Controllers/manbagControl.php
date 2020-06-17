<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Notadinas;
use App\Mail\NotaDinasMail;
use App\ModelUser;
use App\ModelUnit;

class manbagControl extends Controller
{


    public function notadinas(){
        $unit = DB::table('unit')->where('upi',Session::get('upi'))->orderBy('kode','ASC')->get();
        return view('manbag.notadinas',['unit' => $unit]);
    }

    public function tambah(Request $request)
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
        ->send(new NotaDinasMail(
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
    Mail::to($emailRen[0]['email'])
    ->cc([$emailMup3[0]['email'],$emailUser[0]['email']])
    ->bcc('ilham.zulfikri@pln.co.id')
    ->send(new NotaDinasMail(
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

    
    

    return redirect('notadinas')->with('status', 'Nota Dinas Dengan No. '.$request->nonotadinas.' Berhasil Disimpan.');


}

public function daftarSpbj(){

    $notadinas = Notadinas::where('ap','=',strtoupper(Session::get('ap')))
    ->join('hpe','hpe.notadinas_id','=','notadinas.id')->where('hpe.khs','=','1')
    ->join('kontrak','kontrak.notadinas_id','=','notadinas.id')->where('kontrak.selesai','=',NULL)
    ->select('notadinas.*', 'kontrak.vendor_pemenang as vendor_pemenang')
    ->get();
    
    return view('manbag.spbj-daftar',['notadinas' => $notadinas]);

}

public function daftarAddendum(){
    $notadinas = Notadinas::where('ap','=',strtoupper(Session::get('ap')))
    ->join('hpe','hpe.notadinas_id','=','notadinas.id')->where('hpe.khs','=',NULL)
    ->join('kontrak','kontrak.notadinas_id','=','notadinas.id')->where('kontrak.selesai','=',NULL)
    ->select('notadinas.*', 'kontrak.vendor_pemenang as vendor_pemenang')
    ->get();
    
    return view('manbag.addendum-daftar',['notadinas' => $notadinas]);

}



}
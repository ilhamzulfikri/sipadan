<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Mail\HPEMail;
use App\Notadinas;
use App\HPE;
use App\ModelHPE;
use App\ModelUser;

class ksaControl extends Controller
{

	public function tagihan(){
       $notadinas = Notadinas::where('kontrak.selesai','=',NULL)
       ->join('kontrak','kontrak.notadinas_id','=','notadinas.id')
       ->orderBy('tgl_notadinas', 'ASC')
       ->get();
       return view('ksa.tagihan',['notadinas' => $notadinas]);
   }

   public function lihatTagihan($id){
    $notadinas = Notadinas::where('id', $id)->get();
    $vendor = DB::table('vendor')->get();
    return view('ksa.lihat-tagihan',['notadinas' => $notadinas, 'vendor' => $vendor]);
}

public function simpanTagihan(Request $request){

    try{
        DB::table('kontrak')->where('id',$request->kontrak_id)->update([
            'selesai' => '1'
        ]);

    }catch(\Illuminate\Database\QueryException $ex){
        return redirect('tagihan')->with('status', 'Gagal Disimpan. '.$ex->getMessage().'.');
    }

    try{
        DB::table('tagihan')->insert([
            'jenis_tagihan' => $request->jenis_tagihan,
            'tgl_tagihan' => $request->tgl_tagihan,
            'nilai_tagihan' => $request->nilai_tagihan,
            'ket_tagihan' => $request->ket_tagihan,
            'notadinas_id' => $request->notadinas_id,
            'hpe_id' => $request->hpe_id,
            'proses_pengadaan_id' => $request->prosespengadaan_id,
            'kontrak_id' => $request->kontrak_id,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }catch(\Illuminate\Database\QueryException $ex){
        return redirect('tagihan')->with('status', 'Gagal Disimpan. '.$ex->getMessage().'.');
    }

    $emailUser = ModelUser::select('email','nama','jabatan')->where('bidang', $request->bidang)->get();
    $emailRen = ModelUser::select('email','nama','jabatan')->where('bidang', 'REN')->get();
    $emailLakdan = ModelUser::select('email','nama','jabatan')->where('bidang', 'LAKDAN')->get();
    $emailMup3 = ModelUser::select('email','nama','jabatan')->where('bidang', 'MUP3')->get();

    function rupiah($angka){

        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
        return $hasil_rupiah;

    }

    Mail::to($emailLakdan[0]['email'])
    ->cc([$emailMup3[0]['email'],$emailRen[0]['email'],$emailUser[0]['email']])
    ->bcc('ilham.zulfikri@pln.co.id')
    ->send(new HPEMail(
        $request->nonotadinasrks,
        date("d / m / Y",strtotime($request->tglnotadinasrks)),
        rupiah($request->nilai_tagihan),
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


    return redirect('tagihan')->with('status', 'Data Berhasil Disimpan.');
}

}
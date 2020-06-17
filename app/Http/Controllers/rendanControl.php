<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Mail\RksMail;
use App\Notadinas;
use App\HPE;
use App\ModelHPE;
use App\ModelUser;

class rendanControl extends Controller
{

	public function daftarRks(){
        $notadinas = Notadinas::all();
        return view('rendan.rks-daftar',['notadinas' => $notadinas]);
    }

    public function lihatRks($id){
        $notadinas = DB::table('notadinas')->where('id',$id)->get();
        $vendor = DB::table('vendor')->get();
        return view('rendan.rks-lihat',['notadinas' => $notadinas, 'vendor' => $vendor]);
    }

    public function tambahRks(Request $request)
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
                'waktu' => $request->waktupekerjaan." ".$request->lamapekerjaan,
                'metode' => $request->metode,
                'vendor' => $request->vendor,
                'khs' => $request->khs,
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

        Mail::to($emailLakdan[0]['email'])
        ->cc([$emailMup3[0]['email'],$emailRen[0]['email'],$emailUser[0]['email']])
        ->bcc('ilham.zulfikri@pln.co.id')
        ->send(new RksMail(
            $request->nonotadinasrks,
            date("d / m / Y",strtotime($request->tglnotadinasrks)),
            rupiah($request->nilaihpe),
            $request->pekerjaan,
            $request->lokasi,
            $request->bidang,
            $emailLakdan[0]['jabatan'],
            $request->waktupekerjaan." ".$request->lamapekerjaan,
            $request->metode,
            $request->vendor,
            $request->sumberdana,
            $request->noprk
        ));
        
        

        return redirect('rks')->with('status', 'RKS Dengan No. '.$request->norks.' Berhasil Disimpan.');

    }

}
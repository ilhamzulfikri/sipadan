<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Mail\SipadanMailScheduler;
use App\ModelUser;
use App\Notadinas;
use App\ModelHPE;

class SipadanScheduler extends Model
{

 public function cekSipadan(){

  $notadinas = Notadinas::where('hpe.id', '=', NULL)
  ->leftJoin('hpe','hpe.notadinas_id','=','notadinas.id')
  ->where('tgl_notadinas', '<', date("Y-m-d"))
  ->get();

  $prosespengadaan = ModelHPE::where('proses_pengadaan.selesai','=',NULL)
  ->join('notadinas','hpe.notadinas_id','=','notadinas.id')
  ->leftJoin('proses_pengadaan','proses_pengadaan.hpe_id','=','hpe.id')
  ->select('hpe.no_rks','hpe.tgl_notaman','notadinas.no_notadinas','notadinas.id AS notadinas_id','notadinas.bidang','notadinas.tgl_notadinas','notadinas.pekerjaan','hpe.nilai_hpe','notadinas.lokasi','proses_pengadaan.hpe_id')
  ->get();

  $akhirkontrak = Notadinas::where('kontrak.selesai','=',NULL)
  ->join('kontrak','kontrak.notadinas_id','=','notadinas.id')
  ->where('tgl_akhir_kontrak', '<', date("Y-m-d"))
  ->get();

  //$hit = $akhirkontrak->count();

  $emailUser = ModelUser::all();
  $emailLakdan = ModelUser::select('email','nama','jabatan')->where('bidang', 'LAKDAN')->get();
  $emailMup3 = ModelUser::select('email','nama','jabatan')->where('bidang', 'MUP3')->get();
  $emailRen = ModelUser::select('email','nama','jabatan')->where('bidang', 'REN')->get();



  Mail::to('ilham.zulfikri@pln.co.id')
  ->send(new SipadanMailScheduler(
    $notadinas,
    $prosespengadaan,
    //$akhirkontrak
    $emailUser
  ));

}
}

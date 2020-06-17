<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Mail\IamMail;
use App\Mail\TagihanMailScheduler;
use App\Mail\JadwalMail;
use App\Mail\KontrakMail;
use App\Mail\GagalMail;
use App\ModelUser;
use App\Notadinas;
use App\HPE;
use App\ModelND;
use App\ModelHPE;
use App\ModelVendor;

class TagihanScheduler extends Model
{
    //

  public function cekTagihan(){

   $notadinas = Notadinas::where('kontrak.selesai','=',NULL)
   ->join('kontrak','kontrak.notadinas_id','=','notadinas.id')
   ->where('tgl_akhir_kontrak', '<', date("Y-m-d"))
   ->get();

   $hit = $notadinas->count();

   $emailRen = ModelUser::select('email','nama','jabatan')->where('bidang', 'REN')->get();
   $emailMup3 = ModelUser::select('email','nama','jabatan')->where('bidang', 'MUP3')->get();

   Mail::to('ilham.zulfikri@pln.co.id')
   ->send(new TagihanMailScheduler(
    $notadinas,
    'Manager UP3'
  ));

 }
}

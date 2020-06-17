<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Mail\IamMail;
use App\Mail\MailScheduler;
use App\Mail\JadwalMail;
use App\Mail\KontrakMail;
use App\Mail\GagalMail;
use App\ModelUser;
use App\Notadinas;
use App\HPE;
use App\ModelND;
use App\ModelHPE;
use App\ModelVendor;

class RendanScheduler extends Model
{
    //
    protected $table = "tes";

    public function tes(){

    	/*$notadinas = Notadinas::where('hpe.id','=',NULL)
    				->join('hpe','hpe.notadinas_id','=','notadinas.id')
    				->get();
    				*/
    	$notadinas = Notadinas::where('hpe.id', '=', NULL)
    				->leftJoin('hpe','hpe.notadinas_id','=','notadinas.id')
    				->get();
    	$hit = $notadinas->count();
    	/*

	    Mail::to('ilham.zulfikri@gmail.com')
	        ->send(new IamMail(
	        	$notadinas[0]['no_notadinas'],
	            date("d / m / Y",strtotime($notadinas[0]['tgl_notadinas'])),
	        	'100000000',
	        	$notadinas[0]['pekerjaan'],
	        	$notadinas[0]['lokasi'],
	        	'TREN',
	        	'ADMIN SIPADAN',
	            $notadinas[0]['sumber_dana'],
	            $notadinas[0]['no_prk']
	    ));

	    */

        $emailRen = ModelUser::select('email','nama','jabatan')->where('bidang', 'REN')->get();
        $emailMup3 = ModelUser::select('email','nama','jabatan')->where('bidang', 'MUP3')->get();

	     Mail::to('ilham.zulfikri@pln.co.id')
	        ->send(new MailScheduler(
	        	$notadinas,
	        	$emailRen[0]['jabatan']
	    ));
		
    	for($i = 0; $i < $hit; $i++){

    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('tes')->insert([
            'nama' => $notadinas[$i]['pekerjaan'],
            'alamat' => $hit,
            'created_at' => date("Y-m-d h:i:s")
        ]);
    	}

    }
}

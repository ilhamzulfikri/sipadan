<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\ModelUser;
use App\Notadinas;
use App\HPE;
use App\ProsesPengadaan;
use App\Kontrak;
use App\ModelND;
use App\ModelHPE;
use App\ModelVendor;

class CountController extends Controller
{

    public function beranda(){

        $ap = strtoupper(Session::get('ap'));

        $totalPekerjaan = Notadinas::where('ap','=',$ap)->count();

        $pembuatanRKS = Notadinas::where([['hpe.notadinas_id','=',NULL],['ap','=',$ap]])->leftJoin('HPE','hpe.notadinas_id','=','notadinas.id')->count();
        //$pembuatanKontrak = ProsesPengadaan::count();
        $tahapLelang = ModelHPE::where([['proses_pengadaan.selesai','=',NULL],['ap','=',$ap]])
        ->join('notadinas','hpe.notadinas_id','=','notadinas.id')
        ->leftJoin('proses_pengadaan','proses_pengadaan.hpe_id','=','hpe.id')
        ->select('hpe.no_rks','notadinas.no_notadinas','notadinas.id AS notadinas_id','notadinas.bidang','notadinas.tgl_notadinas','notadinas.pekerjaan','hpe.nilai_hpe','notadinas.lokasi','proses_pengadaan.hpe_id')
        ->count();
        $pembuatanKontrak = Notadinas::where([['proses_pengadaan.selesai','=','1'],['upload_pakta','=',NULL],['ap','=',$ap]])
        ->join('hpe','hpe.notadinas_id','=','notadinas.id')
        ->join('proses_pengadaan','proses_pengadaan.notadinas_id','=','notadinas.id')
        ->leftJoin('kontrak','kontrak.notadinas_id','=','notadinas.id')
        ->select('hpe.no_rks','notadinas.no_notadinas','notadinas.id AS notadinas_id','notadinas.bidang','notadinas.tgl_notadinas','notadinas.pekerjaan','hpe.nilai_hpe','notadinas.lokasi','proses_pengadaan.hpe_id')
        ->count();
        $tahapPekerjaan = DB::table('kontrak')->distinct('notadinas_id')->where('selesai','=',NULL)
        ->join('notadinas','kontrak.notadinas_id','=','notadinas.id')->where('notadinas.ap','=',$ap)
        ->count('notadinas_id');
        //Kontrak::select('notadinas_id')->distinct()->where('selesai','=',NULL)->count();
        $pekerjaanSelesai = Kontrak::where('selesai','=','1')
        ->join('notadinas','kontrak.notadinas_id','=','notadinas.id')->where('notadinas.ap','=',$ap)
        ->count();

        $totalPerBidang = Notadinas::select('bidang',DB::raw('count(bidang) AS jlh'))
        ->where('ap','=',$ap)
        ->groupBy('bidang')
        ->get();

        $totalUser = ModelUser::all()->count();
        $totalVendor = ModelVendor::all()->count();
        $persenSelesai = 0;
        if($totalPekerjaan>0){
            $persenSelesai = $pekerjaanSelesai/$totalPekerjaan*100;
        }   



        return view('beranda', [
            'totalPekerjaan' => $totalPekerjaan,
            'pembuatanRKS' => $pembuatanRKS,
            'tahapLelang' => $tahapLelang,
            'pembuatanKontrak' => $pembuatanKontrak, 
            'tahapPekerjaan' => $tahapPekerjaan,
            'totalPerBidang' => $totalPerBidang,
            'pekerjaanSelesai' => $pekerjaanSelesai,
            'totalUser' => $totalUser,
            'totalVendor' => $totalVendor,
            'persenSelesai' => $persenSelesai
        ]);
    }
    
}

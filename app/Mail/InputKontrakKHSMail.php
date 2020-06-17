<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InputKontrakKHSMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pekerjaan;
    public $tglmulai;
    public $tglakhir;
    public $lokasi;
    public $sumberdana;
    public $noprk;
    public $nilai;
    public $metode;
    public $bidang;
    public $nokontrak;
    public $vendor;
    public $nokontrak2;
    public $vendor2;
    public $nokontrak3;
    public $vendor3;
    public $jabatan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p)
    {
        //
        $this->subject('SIPADAN NOTIFIKASI');
        $this->pekerjaan = $a;
        $this->tglmulai = $b;
        $this->tglakhir = $c;
        $this->lokasi = $d;
        $this->sumberdana = $e;
        $this->noprk = $f;
        $this->nilai = $g;
        $this->metode = $h;
        $this->bidang = $i;
        $this->nokontrak = $j;
        $this->vendor = $k;
        $this->nokontrak2 = $l;
        $this->vendor2 = $m;
        $this->nokontrak3 = $n;
        $this->vendor3 = $o;
        $this->jabatan = $p;
    }
    

    /**
     * Build the message.
     *
     * @return $this
     */
    
    public function build()
    {
        return $this->from('sipadan@pln.co.id')
        ->view('lakdan.inputkontrakkhs-mail')
        ->with(
            [
                'pekerjaan' => $this->pekerjaan,
                'tglmulai' => $this->tglmulai,
                'tglakhir' => $this->tglakhir,
                'lokasi' => $this->lokasi,
                'sumberdana' => $this->sumberdana,
                'noprk' => $this->noprk,
                'nilai' => $this->nilai,
                'metode' => $this->metode,
                'bidang' => $this->bidang,
                'nokontrak' => $this->nokontrak,
                'vendor' => $this->vendor,
                'nokontrak2' => $this->nokontrak2,
                'vendor2' => $this->vendor2,
                'nokontrak3' => $this->nokontrak3,
                'vendor3' => $this->vendor3,
                'jabatan' => $this->jabatan
            ]);
    }
    

}

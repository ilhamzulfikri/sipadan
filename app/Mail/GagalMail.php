<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GagalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nond;
    public $tglnd;
    public $nilairab;
    public $pekerjaan;
    public $lokasi;
    public $bidang;
    public $jabatan;
    public $waktu;
    public $metode;
    public $pelaksana;
    public $sumberdana;
    public $noprk;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l)
    {
        //
        $this->subject('SIPADAN NOTIFIKASI');
        $this->nond = $a;
        $this->tglnd = $b;
        $this->nilairab = $c;
        $this->pekerjaan = $d;
        $this->lokasi = $e;
        $this->bidang = $f;
        $this->jabatan = $g;
        $this->waktu = $h;
        $this->metode = $i;
        $this->pelaksana = $j;
        $this->sumberdana = $k;
        $this->noprk = $l;

    }
    

    /**
     * Build the message.
     *
     * @return $this
     */
    
    public function build()
    {
        return $this->from('sipadan@pln.co.id')
                   ->view('emailkontrak')
                   ->with(
                    [
                        'jabatan' => $this->jabatan,
                        'nond' => $this->nond,
                        'tglnd' => $this->tglnd,
                        'nilairab' => $this->nilairab,
                        'pekerjaan' => $this->pekerjaan,
                        'lokasi' => $this->lokasi,
                        'bidang' => $this->bidang,
                        'waktu' => $this->waktu,
                        'metode' => $this->metode,
                        'pelaksana' => $this->pelaksana,
                        'sumberdana' => $this->sumberdana,
                        'noprk' => $this->noprk
                    ]);
    }
    

}

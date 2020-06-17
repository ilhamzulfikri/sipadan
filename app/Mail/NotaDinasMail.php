<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotaDinasMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nond;
    public $tglnd;
    public $nilairab;
    public $pekerjaan;
    public $lokasi;
    public $jabatan;
    public $sumberdana;
    public $noprk;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($a,$b,$c,$d,$e,$f,$g,$i,$j)
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
        $this->sumberdana = $i;
        $this->noprk = $j;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sipadan@pln.co.id')
                   ->view('manbag.notadinas-mail')
                   ->with(
                    [
                        'jabatan' => $this->jabatan,
                        'nond' => $this->nond,
                        'nilairab' => $this->nilairab,
                        'pekerjaan' => $this->pekerjaan,
                        'lokasi' => $this->lokasi,
                        'bidang' => $this->bidang,
                        'sumberdana' => $this->sumberdana,
                        'noprk' => $this->noprk
                    ]);
    }
}

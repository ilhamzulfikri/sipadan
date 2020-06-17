<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SipadanMailScheduler extends Mailable
{
    use Queueable, SerializesModels;

    public $notadinas;
    public $prosespengadaan;
    public $akhirkontrak;
    public $jabatan;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($a,$b,$c)
    {
        //
        $this->subject('SIPADAN NOTIFIKASI');
        $this->notadinas = $a;
        $this->prosespengadaan = $b;
        $this->akhirkontrak = $c;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sipadan@pln.co.id')
        ->view('sipadan-mail-scheduler')
        ->with(
            [
                'notadinas' => $this->notadinas,
                'prosespengadaan' => $this->prosespengadaan,
                'akhirkontrak' => $this->akhirkontrak
            ]);
    }
}

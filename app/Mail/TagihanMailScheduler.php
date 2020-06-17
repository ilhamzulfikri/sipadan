<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TagihanMailScheduler extends Mailable
{
    use Queueable, SerializesModels;

    public $notadinas;
    public $jabatan;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($a,$b)
    {
        //
        $this->subject('SIPADAN NOTIFIKASI');
        $this->notadinas = $a;
        $this->jabatan = $b;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sipadan@pln.co.id')
                   ->view('ksa.tagihan-mail-scheduler')
                   ->with(
                    [
                        'notadinas' => $this->notadinas,
                        'jabatan' => $this->jabatan
                    ]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class welcomeLaraDev extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    
    private $user;
    private $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\stdClass $user, \stdClass $order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Bem vindo ao curso Laravel Developer');
        $this->to($this->user->mail, $this->user->name);

        return $this->markdown('mail.welcomeLaraDev')->with([
            'user' => $this->user,
            'order' => $this->order
        ]);
    }
}

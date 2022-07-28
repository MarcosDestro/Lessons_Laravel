<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this
            // Pra quem responder
            ->replyTo($this->data['reply_mail'], $this->data['reply_name'])
            // Pra quem vai, no caso do próprio sistema
            ->to(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            // De quem disparou, de novo no caso do próprio sistema
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            // Assunto
            ->subject('Novo contato: ' . $this->data['subject'])
            // Montagem do email, passando os dados novamente agora para a visão
            ->markdown('email.contact')
            ->with([
                'reply_name' => $this->data['reply_name'],
                'reply_mail' => $this->data['reply_mail'],
                'subject' => $this->data['subject'],
                'message' => $this->data['message']
            ]);

            // $this->replyTo($this->data['reply_mail'], $this->data['reply_name']);
            // $this->to(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            // $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            // $this->subject('Novo contato: ' . $this->data['subject']);

            // return 
            // $this->markdown('email.contact')->with([
            //             'reply_name' => $this->data['reply_name'],
            //             'reply_mail' => $this->data['reply_mail'],
            //             'subject' => $this->data['subject'],
            //             'message' => $this->data['message']
            //         ]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WlcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    use Queueable, SerializesModels;

    public $msg;
    public function __construct($msg)
    {
        $this->msg=$msg;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Wlcome Email',
        );
    }

    public function build(){
        //  return $this->view("emails.wlecome")
        //  ->with(['user'=>$this->user])
        // ->subject('hellow');
         return $this->from('nassimesofian@gmail.com','laravle test')->subject('test')->view('emails.wlecome')->with(['msg'=>$this->msg]);
    }
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.wlecome',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
